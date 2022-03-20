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
use Symfony\Contracts\Service\Attribute\Required;

class SocialLoginController extends Controller
{
    public function googleRedirect()
    {
        // dd('okk');
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
                if ($user->account_complete == 1) {
                    return redirect()->route('frontend.index');
                } elseif ($user->account_complete == 0) {
                    return redirect()->route('select-user-type');
                } else {
                    return redirect()->route('create_profile');
                }
            }
            $existingUser = User::where('email', $googleUser->getEmail())->first();
            // dd($existingUser);
            if ($existingUser) {

                $existingUser->google_id = $googleUser->id;
                $existingUser->save();
                Auth::login($existingUser);

                if ($existingUser->account_complete == 1) {
                    return redirect()->route('frontend.index');
                } elseif ($existingUser->account_complete == 0) {
                    return redirect()->route('select-user-type');
                } else {
                    return redirect()->route('create_profile');
                }
            } else {
                $createUser = User::create([
                    'first_name' => explode(' ', $googleUser->name)[0],
                    'last_name' => @explode(' ', $googleUser->name)[1],
                    'email' => $googleUser->email,
                    'google_id' => $googleUser->id,
                    'password' => encrypt('test@123')
                ]);
                Auth::login($createUser);

                return redirect()->route('select-user-type');
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
                if ($existingUser->account_complete == 1) {
                    return redirect()->route('frontend.index');
                } elseif ($existingUser->account_complete == 0) {
                    return redirect()->route('select-user-type');
                } else {
                    return redirect()->route('create_profile');
                }
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

            return redirect()->route('select-user-type');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function selectUserType()
    {

        return view('frontend.select-user-type');
    }

    public function saveSelectUserType(Request $request)
    {
        $user = $request->validate([
            'user_type' => 'required',
        ]);

        $userId = Auth::user()->id;
        $usergetId  = User::where('id', $userId)->first();
        if ($usergetId->account_complete == 0) {

            $user = Auth::user();
            $user->user_type = $request->user_type;
            $user->account_complete = $request->account_complete;
            $user->update();

            if ($user) {
                return redirect()->route('create_profile');
            }
            return back();
        } else {
            return redirect()->route('frontend.index');
        }
    }
}
