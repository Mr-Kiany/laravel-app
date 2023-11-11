<?php

namespace App\Http\Controllers;

use App\Tools\ResponseController;
use Illuminate\Http\Request;

class AuthController extends ResponseController
{
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();

        return $this->respond("Successfully logged out");
    }
}
