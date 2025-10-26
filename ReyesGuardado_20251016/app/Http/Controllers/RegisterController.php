<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use validator;
use Illuminate\Http\JsonResponse;

class RegisterController extends BaseController

{
    public function register(Request $request) : JsonResponse
    {
        $validator = validator::make($request->all(),
        [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        if($validator->fails())
        {
            return $this->sendError('validation Error.', $validator->erros());
        }

        $input =  $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = user::create($input);

        $success['token'] = $user->createTok('MyApp')->plainTextToken;
        $success['name'] = $user->name;
        
        return $this->sendResponse($success,'User registred successfully.');
    }

    public function login(Request $request): JsonResponse 
    {
        if(Auth::attemp(['email' =>  $request->email,'password' => $request->password]))
    {
        $user = Auth::user();
        $success['token'] = $user->createToken('MyApp')->plainTextToken;
        $success['name'] = $user->name;
        return $this->sendResponse($success,'User login successfully.');
    }
    else
    {
    return $this->sendResponse('Unathorized', ['error' =>'Unathorized' ]);
    }
}