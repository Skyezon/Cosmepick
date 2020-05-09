<?php

namespace App\Http\Controllers;

use App\ChosenWorkshop;
use App\Http\Requests\VerifyWorkshopEditRequest;
use App\Http\Requests\VerifyWorkshopRequest;
use App\UserImage;
use App\Workshop;
use App\WorkshopImage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function editPost(VerifyWorkshopEditRequest $request){
        $workshop = Auth::user()->chosenWorkshops()->wherePivot('workshop_status','my_workshop')->first();
        $this->editWorkshop($request,$workshop->id);
        $this->updateWorkshopImg($workshop->id,$request);

        return redirect(route('showEditClass'))->with('message','successfully updated workshop');
    }

    private function storeWorkshopImg($workshopId, $request){
        foreach ($request->file('workshopImgs') as $key => $image) {
            $path = $image->store('/workshops/workshop'.$workshopId.'/workshopImages');
            $this->insertWorkshopImagePath($path, $workshopId, $key);
        }
    }

    private function updateWorkshopImg($workshopId, $request){
        
        $workshopImagesRequest  = $request->file('workshopImgs');
        $workshop = Workshop::find($workshopId);
     
        
        if(count($workshopImagesRequest) == 0){
            return;
        } 
        for ($i = 0 ;$i < 5; $i++){
            $workshopImage = $workshop->workshopImages()->where('index',$i)->first();
            !empty($workshopImagesRequest[$i]) ?? Storage::delete('public/'.$workshopImage->url);
            if(!empty($workshopImagesRequest[$i])){                

                $path = $workshopImagesRequest[$i]->store('/workshops/workshop'.$workshopId.'/workshopImages');
                
                if($workshop->workshopImages()->where('index',$i)->first() == null ){
                    $this->insertWorkshopImagePath($path, $workshopId, $i);
                }else{
                    $this->updateWorkshopImagePath($path,$workshop->id,$i);
                }
            }else{
                continue;
            }
                
        }
    }

    private function insertWorkshopImagePath($path, $workshopId, $index){
        WorkshopImage::create([
            'workshop_id' => $workshopId,
            'url' => $path,
            'index' => $index
        ]);
    }

    private function updateWorkshopImagePath($path, $workshopId, $index){
        $workshop = Workshop::find($workshopId);
        $workshopImage = $workshop->workshopImages()->where('index',$index)->first();
       return $workshopImage->update([
            'workshop_id' => $workshopId,
            'url' => $path,
            'index' => $index
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

   

    public function editWorkshop($request, $id){
        $workshop = Workshop::find($id);
       return $workshop->update([
            'name' => $request->name,
            'category' => $request->category,
            'location' => $request->location,
            'date' => $request->date,
            'price' => $request->price,
            'duration' => $request->duration,
            'instructor' => $request->instructor,
            'description' => $request->description
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
        return back()->with('status','Successfully verify workshop');
    }

    public function noVerifyWorkshop($id){
        $workshop = Workshop::find($id);
        $userImage = UserImage::where('workshop_id',$id)->first();
        $workshopImages = WorkshopImage::where('workshop_id',$id);
        foreach($workshopImages as $image){
            Storage::delete('public/'.$image->url);
        }
        Storage::delete('public/'.$userImage->url_only_ktp);
        Storage::delete('public/'.$userImage->url_with_ktp);
        $workshop->forceDelete();
        return back()->with('delete','Successfully Refuse workshop');
    }

    public function index(){
        $workshops = $this->getJoinWorkshopList(Auth::User());
        $workshops = Workshop::paginate(5);
        return view('join',compact('workshops'));
    }

    private function getJoinWorkshopList($user){
        $notDisplayedWorkshopId = Auth::check() ? $this->getUserUndisplayedWorkshopId($user) : $this->getGuestUndisplayedWorkshopId();
        return Workshop::whereNotIn('id', $notDisplayedWorkshopId->toArray())->where('is_verified', 1)->paginate(5);
    } 

    private function getUserUndisplayedWorkshopId($user){
        return $user->chosenWorkshops()
        ->where(function($query){
            $query->where('workshop_status', 'my_workshop')
            ->orWhere('workshop_status', 'upcoming');
        })
        ->distinct()->pluck('workshop_id');
    }
    
    private function getGuestUndisplayedWorkshopId(){
        return ChosenWorkshop::where('workshop_status', 'history')
        ->distinct()->pluck('workshop_id');
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

    public function getUserWishlistWorkshop(){
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

    public function getUpcomingWorkshop(){
        return Auth::user()->chosenWorkshops()
        ->where('is_verified', 1)
        ->wherePivot('workshop_status', 'upcoming')
        ->get();
    }

    public function softDeleteWorkshop($id){
        $workshop = Workshop::find($id);
        $workshop->chosenWorkshops()->detach(Auth::user()->id);
        $workshop->delete();
        return redirect()->back();
    }

    public function removeWishlistWorkshop(Workshop $workshop){
        Auth::user()->chosenWokshops()->detach($workshop->id);
        return redirect()->back();
    }

    public function editShow(){
        $userWorkshop = Auth::user()->chosenWorkshops()->wherePivot('workshop_status','my_workshop')->first();
        $firstImageworkshopId = $userWorkshop->workshopImages()->first()->id;
        return view('editWorkshop',['workshop' => $userWorkshop,'workshopImages' => $userWorkshop->workshopImages, 'firstImageId' => $firstImageworkshopId]);
    }

    public function hasUnverifiedWorkshopReq($user){
        return ($this->findUnverifiedWorkshopReq($user)->isEmpty()) ? false : true;
    }

    private function findUnverifiedWorkshopReq($user){
        return $user->chosenWorkshops()
        ->wherePivot('workshop_status', 'my_workshop')
        ->where('is_verified', 2)
        ->get();
    }

    public function search(Request $query){
        $workshops = $workshop::where('name','LIKE','%'.$query.'%');
        return view('join',compact('workshops'));
    }
}
