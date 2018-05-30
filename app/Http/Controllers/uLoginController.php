<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class uLoginController extends Controller
{
    public function login(Request $request){
        // Get information about user.
        $data = file_get_contents('http://ulogin.ru/token.php?token=' . $_POST['token'] . '&host=' . $_SERVER['HTTP_HOST']);
        $user = json_decode($data, TRUE);

        $network = $user['network'];

        // Find user in DB.
        $userData = User::where('email', $user['email'])->first();

        if (!(Auth::check())){

            // Check exist user.
            if (isset($userData->id)) {

                // Check user status.
                if ($userData->status != 0) {

                    // Make login user.
                    Auth::loginUsingId($userData->id, TRUE);
                }
                // Wrong status.
                else {
                    \Session::flash('flash_message_error', trans('interface.AccountNotActive'));
                }

                return \redirect('/');
            }
            // Make registration new user.
            else {

                // Create new user in DB.
                $newUser = User::create([
                    'name' => $user['first_name'] . ' ' . $user['last_name'],
                    'email' => $user['email'],
                    'password' => Hash::make(str_random(8)),
                    'status' => TRUE,
                    'ip' => $request->ip()
                ]);

                // Make login user.
                Auth::loginUsingId($newUser->id, TRUE);

                \Session::flash('flash_message', trans('interface.ActivatedSuccess'));

                return \redirect('/');

            }
        }else return \redirect('/');
    }
}
