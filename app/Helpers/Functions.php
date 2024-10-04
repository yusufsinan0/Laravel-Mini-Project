<?php

use Illuminate\Support\Facades\Auth;

if(!function_exists('isAdmin')){
    function isAdmin(){
        $user = Auth::user();

        if($user && $user->usertypeid == 1){
            return true;
        } else {
            return false;
        }

    }
}

if(!function_exists(('formatDateDayMonthYear'))){
    function formatDateDayMonthYear($dateString){

        $dateTime = new DateTime($dateString);
        return $dateTime->format('d-m-Y H:i');
    }
}






