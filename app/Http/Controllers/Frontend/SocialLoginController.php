<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class SocialLoginController extends Controller
{
    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function loginWithGoogle()
    {
        try {
           
            $googleUser = Socialite::driver('google')->stateless()->user();
            // print_r($googleUser);die;
            $user = User::where('google_id', $googleUser->id)->first();

            if ($user) {
                Auth::login($user);

                return redirect()->route('frontend.index');
            }
            $existingUser = User::where('email', $googleUser->getEmail())->first();
            // dd($existingUser);
            if ($existingUser) {

                $existingUser->google_id = $googleUser->id;
                $existingUser->save();

                Auth::login($existingUser);
                return redirect()->route('frontend.index'); 
            } 
            
             else {
                $createUser = User::create([
                    'first_name' => explode(' ', $googleUser->name)[0],
                    'last_name' => @explode(' ', $googleUser->name)[1],
                    'email' => $googleUser->email,
                    'google_id' => $googleUser->id,
                    'password' => encrypt('test@123')
                ]);
                Auth::login($createUser);

                return redirect()->route('frontend.index');
            }
        } catch (Exception $exception) {

            dd($exception->getMessage());
        }
    }

    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function loginWithFacebook()
    {
        try {
            $user = Socialite::driver('facebook')->stateless()->user();
          //dd($user);
          $existingUser = User::where('email', $user->getEmail())->first();
            // dd($existingUser);
            if ($existingUser) {

                $existingUser->facebook_id = $user->getId();
                $existingUser->save();

                Auth::login($existingUser);
                return redirect()->route('frontend.index'); 
            } 
            $saveUser = User::updateOrCreate([
                'facebook_id' => $user->getId(),
            ], [
                'first_name' => explode(' ', $user->getName())[0],
                'last_name' => @explode(' ', $user->getName())[1],  
                'email' => $user->getEmail(),
                'password' => Hash::make($user->getName() . '@' . $user->getId())
            ]);

            Auth::loginUsingId($saveUser->id);

            return redirect()->route('frontend.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
