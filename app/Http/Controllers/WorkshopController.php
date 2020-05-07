<?php

namespace App\Http\Controllers;

use App\Http\Requests\VerifyWorkshopRequest;
use App\UserImage;
use App\Workshop;
use App\WorkshopImage;
use Illuminate\Support\Facades\Redirect;

class WorkshopController extends Controller
{
    public function sendVerifyWorkshopReq(VerifyWorkshopRequest $request){
        $unverifiedWorkshop = $this->insertWorkshopReqData($request);
        $this->attachUserAndWorkshop($unverifiedWorkshop, $request->user()->id);
        $this->storeWorkshopImg($unverifiedWorkshop->id, $request);
        $this->storeUserImg($unverifiedWorkshop->id, $request);
        return redirect(route('ViewWait'));
    }

    private function storeWorkshopImg($workshopId, $request){
        $idx = 1;
        foreach ($request->file('workshopImgs') as $image) {
            $path = $image->store('/workshops/workshop'.$workshopId.'/workshopImages');
            $this->insertWorkshopImagePath($path, $workshopId);
            $idx++;
        }
    }

    private function insertWorkshopImagePath($path, $workshopId){
        WorkshopImage::create([
            'workshop_id' => $workshopId,
            'url' => $path
        ]);
    }

    private function storeUserImg($workshopId, $request){
        $paths = [
            'onlyKtpPath' => $request->file('idOnlyImg')->store('/workshops/workshop'.$workshopId.'/user'.$request->user()->id.'/ktp'),
            'withKtpPath' => $request->file('idWithUserImg')->store('/workshops/workshop'.$workshopId.'/user'.$request->user()->id.'/with_ktp'),
        ];

        $this->insertUserImagePath($paths, $workshopId);
    }

    private function insertUserImagePath($imgPaths ,$workshopId){
        UserImage::create([
            'workshop_id' => $workshopId,
            'url_only_ktp' => $imgPaths['onlyKtpPath'],
            'url_with_ktp' => $imgPaths['withKtpPath']
        ]);
    }

    private function insertWorkshopReqData($request){
        return Workshop::create([
            'name' => $request->workshopName,
            'category' => $request->workshopCategory,
            'location' => $request->workshopLocation,
            'date' => $request->scheduledDate,
            'price' => $request->workshopPrice,
            'duration' => $request->workshopDuration,
            'instructor' => $request->workshopInstructor,
            'description' => $request->workshopDescription
        ]);
    }

    public function showNotVerified(){
        $workshops = Workshop::where('is_verified','2')->paginate(10);
        return view('admin_list',compact('workshops'));
    }

    private function attachUserAndWorkshop(Workshop $unverifiedWorkshop, $userId){
        $unverifiedWorkshop->chosenWorkshops()->attach($userId, ['workshop_status' => 'my_workshop']);
    }

    public function verifyWorkshop($id){
        $workshop = Workshop::find($id);
        $workshop->is_verified = 1;
        $workshop->save();
        return back()->with('status','Succesfully verify workshop');
    }

    public function noVerifyWorkshop($id){
        $workshop = Workshop::find($id);
        $workshop->forceDelete();
        return back()->with('delete','Succesfully Refuse workshop');
    }

}
