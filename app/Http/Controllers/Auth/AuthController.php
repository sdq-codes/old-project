<?php

namespace App\Http\Controllers\Auth;

use App\Classes\AuthClass;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    /**
     * @var AuthClass
     */
    private $authClass;

    public function __construct() {
        $this->authClass = new AuthClass;
    }

    public function login(Request $request){
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required'
        ]);
        return $this->authClass->loginUser($request->only(['email','password']));
    }


    public function register(){

    }
}
