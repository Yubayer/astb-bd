<?php

namespace App\Http\Controllers\Socialite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Socialite;
use Auth;
use Exception;
use App\User;

class GoogleController extends Controller
{
    public function redirectToProvider() {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback() {
        try {
    
            $user = Socialite::driver('google')->user();
     
            $finduser = User::where('g_id', $user->id)->first();
     
            if($finduser){
     
                Auth::login($finduser);
    
                return redirect()->route('home');
     
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'g_id'=> $user->id,
                    'password' => encrypt('gap$123')
                ]);
    
                Auth::login($newUser);
     
                return redirect()->route('home');
            }
    
        } catch (Exception $e) {
            // dd($e->getMessage());
            return redirect()->route('home');
        }
    }
}
