<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function index (){


    }

    public function loginIndex(){
        return view('login');
    }

    public function loginPost(AuthRequest $request){

        $validatedData = $request->validated();

        if (Auth::attempt(['email' => $validatedData['email'], 'password' => $validatedData['password']])) {
            $user = Auth::user(); // oturumm açan kullanıcıyı alma

           

            if($user -> usertypeid == 1){
                return redirect()->route('admin.dashboard')->with('success','Giriş başarılı Admin');
            } else if($user-> usertypeid == 2){
                return redirect()->route('customer.request.all')->with('success','Giriş başarılı Customer');
            }
        }



        return redirect()->back()->withErrors([
            'email'=>'Email veya şifre hatalı'
        ])->withInput($request->only('email'));

    }

    public function authReset(){
        if(Auth::check()){
            Auth::logout();
            return redirect()->route('login');

        }


    }


    public function registerIndex(){
        return view('register');
    }

    public function registerPost(UserRequest $request){



        $validatedData = $request->validated();
        $validatedData['password'] = Hash::make($validatedData['password']);



        User::create($validatedData);

        return redirect()->route('login')->with('success','Kullanıcı başarıyla eklendi');



    }

}
