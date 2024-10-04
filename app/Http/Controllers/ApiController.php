<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ApiController extends Controller
{

    public function index() {
        return response()->json(User::all());
    }

    public function userDetailsId($userId){
        try {
            $user = User::findOrFail($userId);
            return response()->json($user);

        } catch(ModelNotFoundException $e){
            return response()->json(['error'=>'Veritabanı modeli bulunamadı'],404);
        }
    }

    public function userDeleteId($userId)
    {
        try {
            $user = User::findOrFail($userId);

            $user->delete();

            return response()->json(['success' => true, 'message' => 'İlgili kullanıcı başarıyla silindi']);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Kullanıcı bulunamadı'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Bir hata oluştu'], 500);
        }
    }

}
