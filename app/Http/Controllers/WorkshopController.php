<?php

namespace App\Http\Controllers;

use App\Http\Requests\VerifyWorkshopRequest;
use App\User;
use App\UserImage;
use App\Workshop;
use App\WorkshopImage;
use Illuminate\Support\Facades\Auth;
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
            $path = '/storage/'.$image->store('/workshops/workshop'.$workshopId.'/workshopImages');
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
            'onlyKtpPath' => '/storage/'.$request->file('idOnlyImg')->store('/workshops/workshop'.$workshopId.'/user'.$request->user()->id.'/ktp'),
            'withKtpPath' => '/storage/'.$request->file('idWithUserImg')->store('/workshops/workshop'.$workshopId.'/user'.$request->user()->id.'/with_ktp'),
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

    public function index(){
        $workshops = Workshop::paginate(5);
        return view('join',compact('workshops'));
    }

    public function show($id){
        $workshop = Workshop::find($id);
        $user = $workshop->chosenWorkshops()->wherePivot('workshop_status','my_workshop')->first();
        $user != null ? $userPhone = $user->phone :$userPhone = '08123456789';
        return view('workshopDetail',['workshop' => $workshop,'user_phone' => $userPhone]);
    }

    public function getUserCreatedWorkshop(){
        return Auth::user()->chosenWorkshops()
        ->where('is_verified', 1)
        ->wherePivot('workshop_status', 'my_workshop')
        ->get();
    }

    public function getUserWhistlistWorkshop(){
        return Auth::user()->chosenWorkshops()
        ->where('is_verified', 1)
        ->wherePivot('workshop_status', 'wishlist')
        ->get();
    }

    public function getTransactionHistory(){
        return Auth::user()->chosenWorkshops()->withTrashed()
        ->where('is_verified', 1)
        ->where(function ($query){
            $query->where('workshop_status', 'history')
            ->orWhere('workshop_status', 'upcoming');
        })
        ->get();
    }

    public function softDeleteWorkshop($id){
        Workshop::find($id)->delete();
        return redirect()->back();
    }

    public function removeWhistlistWorkshop(Workshop $workshop){
        Auth::user()->chosenWokshops()->detach($workshop->id);
        return redirect()->back();
    }

}
