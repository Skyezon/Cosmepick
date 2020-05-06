<?php

namespace App\Http\Controllers;

use App\Http\Requests\VerifyWorkshopRequest;
use App\UserImage;
use App\Workshop;
use App\WorkshopImage;

class WorkshopController extends Controller
{
    public function sendVerifyWorkshopReq(VerifyWorkshopRequest $request){
        $unverifiedWorkshop = $this->insertWorkshopReqData($request);
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
        $workshop = Workshop::all()->where('is_verified','2');
        return view('admin_list',compact('workshop'));
    }
}
