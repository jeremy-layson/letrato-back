<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $username = $request->get('username');
        $password = $request->get('password');

        $user = User::whereUsername($username)
            ->orWhere('email', $username)
            ->first();

        if (is_null($user) === TRUE) {
            return response('Invalid username or password', 422);
        }

        // check if valid password
        if(Hash::check($password, $user->password) === FALSE) {
            return response('Invalid username or password', 422);
        }

        $data = [
            'user'  => $user,
            'token' => $user->createToken('letter-getter')
        ];

        return response($data);
    }
}
