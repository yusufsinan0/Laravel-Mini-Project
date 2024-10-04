<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Request as UserRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AdminRequestForm;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;

class AdminController extends Controller
{
        public function index () {
            return view('pages.admin.dashboard');
        }


        public function completedRequest(){
        $requests = UserRequest::where('status','=','tamamlandı')->get();
        return view('pages.admin.request.completed',compact('requests'));
        }

        public function rejectedRequest(){
        $requests = UserRequest::where('status', '=' ,'reddedildi')->get();
        return view('pages.admin.request.rejected',compact('requests'));
        }

        public function pendingRequest(){
        $requests = UserRequest::where('status', '=','bekliyor')->get();
        return view('pages.admin.request.pending',compact('requests'));
        }

        public function progressRequest(){
        $requests = UserRequest::where('status','=','işleme alındı')->get();
        return view('pages.admin.request.progress',compact('requests'));
        }

        public function allUser(){
            $users = User::all();
            return view('pages.admin.users.all' , compact('users'));
        }

        public function userDetails($userId){
            $id = Crypt::decrypt($userId);
            $users = User::where('id' , '=' , $id)->first();
            return view('pages.admin.users.details' , compact('users') , ['userId'=>$userId]);
        }



        public function requestDetails($requestId) {
            $id = Crypt::decrypt($requestId);

            $request = UserRequest::findOrFail($id);
            return view('pages.admin.request.details', compact('request'), ['requestId' => $requestId]);
        }

        public function requestDetailsPost(AdminRequestForm $request, $requestId) {
            $data = $request->validated();

            UserRequest::findOrFail($requestId)->update([
                'requestReply' => $data['requestReply'],
                'status' => $data['requestStatus'],
            ]);

            return redirect()->route('admin.request.details', ['requestId' => $requestId])->with('success', 'Talep başarıyla güncellendi.');
        }



        public function userDelete ($userId){
            $user = User::where('id', '=', $userId)->first();

            if($user){
                $user->delete();
                return redirect('pages.admin.users.all')->back()->with('success','Kullanıcı başarıyla silindi');
            } else {
                return redirect()->back()->with('error','İlgili kullanıcı bulunamadı');
            }
        }







}
