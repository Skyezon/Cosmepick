<?php

namespace App\Http\Controllers;

use App\Http\Requests\VerifyWorkshopRequest;
use App\UserImage;
use App\Workshop;
use App\WorkshopImage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

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
            $imageName = "workshop_id_".$workshopId."_image_".$idx.'.'.$image->getClientOriginalExtension();
            $path = 'storage/'.$image->storeAs('workshops/workshop'.$workshopId.'/workshopImages', $imageName);
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
        $userImgs = [
            "onlyKtpImg" => "workshop_id_".$workshopId."_user_id_".$request->user()->id."_only_ktp.".
                $request->file('idOnlyImg')->getClientOriginalExtension(),
            "withKtpImg" => "workshop_id_".$workshopId."_user_id_".$request->user()->id."_with_ktp.".
                $request->file('idWithUserImg')->getClientOriginalExtension()
        ];

        $paths = [
            'onlyKtpPath' => 'storage/'.$request->file('idOnlyImg')->storeAs('workshops/workshop'.$workshopId.'/userImages', $userImgs['onlyKtpImg']),
            'withKtpPath' => 'storage/'.$request->file('idWithUserImg')->storeAs('workshops/workshop'.$workshopId.'/userImages', $userImgs['withKtpImg']),
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
        $userImage = UserImage::where('workshop_id',$id)->first();
        $workshopImages = WorkshopImage::where('workshop_id',$id);
        foreach($workshopImages as $image){
            Storage::delete($image->url);
        }
        Storage::delete($userImage->url_only_ktp);
        Storage::delete($userImage->url_with_ktp);
        $workshop->forceDelete();
        return back()->with('delete','Succesfully Refuse workshop');
    }

}
