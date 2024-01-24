<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class SocialController extends Controller
{
    public function googleLogin(){
        return Socialite::driver('google')->redirect();
    }

    public function googleHandle(){
        try{
            $user=Socialite::driver('google')->user();
            // dd($user);
            $findUser=User::where('email',$user->email)->first();
            if(!$findUser){
                $findUser= new User();
                $findUser->name=$user->name;
                $findUser->email=$user->email;
                $findUser->password="1234";
                $findUser->dob=12-12-2000;
                $findUser->save();
            }
            session()->put('id',$findUser->id);
            session()->put('type',$findUser->type);
            return redirect('/home');
        } catch(Exception $e){
            dd($e->getMessage());
        }
    }
}
