<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequestForm;
use Illuminate\Http\Request;
use App\Models\Request as UserRequest;
use Illuminate\Support\Facades\Auth;


class CustomerController extends Controller
{
    public function index (){
        return view('pages.customer.request.all');
    }

    public function addRequest(Request $request ){
        $user = Auth::user();

        return view('pages.customer.request.add',[
            'name'=>$user->name,
            'email'=>$user->email,
            'phone'=>$user->phone,
        ]);
    }

    public function addRequestPost(CustomerRequestForm $request)
    {
        $validatedData = $request->validated();
        $validatedData['user_created_at'] = Auth::user()->id;

        if(isset($validatedData['fileUpload'])) {
            $file = $validatedData['fileUpload'];
            $fileName = time().'_'.$file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $fileName, 'public');
            $validatedData['upload_path'] = $filePath;
        }


        $saveRequest = UserRequest::create($validatedData);

        if ($saveRequest) {
            return redirect()->route('customer.request.all')->with('success', 'Talep başarıyla gönderildi');
        }

        return back()->with('error', 'Talep kaydedilemedi, lütfen tekrar deneyin.');
    }





    public function allRequest(){
        $requests = UserRequest::all();

        return view('pages.customer.request.all',['requests'=>$requests]);

    }

    public function requestDetails($requestId){
        $request = UserRequest::findOrFail($requestId);
        return view('pages.customer.request.details',compact('request') , ['requestId' => $requestId]);
    }

   public function completedRequest(){
    $userId = Auth::id();
    $requests = UserRequest::where('status','=','tamamlandı')->where('user_created_at' , '=' , $userId)->get();
    return view('pages.customer.request.completed',compact('requests'));
   }

   public function rejectedRequest(){
    $userId = Auth::id();
    $requests = UserRequest::where('status', '=' ,'reddedildi')->where('user_created_at' , '=' , $userId)->get();
    return view('pages.customer.request.rejected',compact('requests'));
   }

   public function pendingRequest(){
    $userId = Auth::id();
    $requests = UserRequest::where('status', '=','bekliyor')->where('user_created_at' , '=' , $userId)->get();
    return view('pages.customer.request.pending',compact('requests'));
   }

   public function progressRequest(){
    $userId = Auth::id();
    $requests = UserRequest::where('status','=','işleme alındı')->where('user_created_at' , '=' , $userId)->get();
    return view('pages.customer.request.progress',compact('requests'));
   }



}
