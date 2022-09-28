<?php


namespace App\Classes;


use App\Exceptions\RecordNotFoundException;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthClass
{
    public function __construct() {
        $this->user = new User();
        $this->auth = Auth::guard('api');
    }


    public function loginUser($data){
        $user = null;
        DB::transaction(function () use (&$user,$data){
            $token = $this->auth->attempt(['email' => $data['email'],'password' => $data['password'],'active' => 1]);
            if (!$token){
                throw new AuthenticationException('invalid email or password');
            }
            $user = $this->user->find($this->auth->user()->id);
        });
        $resource = new UserResource($user);
        return response()->fetch('Login Successful',$resource,'user');
    }

    public function registeUser(){

    }

}
