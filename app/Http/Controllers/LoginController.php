<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request; // google auth
use Laravel\Socialite\Two\InvalidStateException;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function index()
    {
        // https://stackoverflow.com/a/44663563/15694873
        $original_url = url()->previous();
        session(['original_url' => $original_url]);

        return Socialite::driver('google')->redirect();
    }

    public function store()
    {
        // before an error occure here because in https://console.cloud.google.com/ only https://codigosoxford.com/* was added and now also is added: https://www.codigosoxford.com/*
        // Update: Now the www url is not used, only the non-www url is used, so the error is not occuring anymore, but the code to catch the error is still here just in case
        
        try
        {
            $google_user = Socialite::driver('google')->user();
        }
        catch (InvalidStateException $e){
            $google_user = Socialite::driver('google')->stateless()->user();
        }

        $user_data = $google_user->user;

        $user = User::updateOrCreate([
            'google_id' => $google_user->id,
        ], [
            'first_name' => $user_data["given_name"],
            'family_name' => $user_data["family_name"] ?? "",
            'picture' => $user_data["picture"] ?? "",
            'locale' => $user_data["locale"] ?? "",
            'email' => $user_data["email"],
        ]);

        Auth::login($user);

        $original_url = session('original_url');

        return redirect()->to($original_url);
    }
}
