<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResurs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends BaseController
{
    public function login(Request $request)
    {
        $success = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if ($success) {
            $user = Auth::user();
            $token = $user->createToken('authToken')->plainTextToken;
            return $this->success([
                'user' => new UserResurs($user),
                'token' => $token,
            ], 'Uspesno logovanje.');
        } else {
            return $this->error('Neispravni podaci.', null, 401);
        }
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return $this->success(null, 'Uspesno odjavljivanje.');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        if($validator->fails()){
            return $this->error('Greska pri validaciji', $validator->errors());
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $odgovor['name'] =  $user->name;
        $odgovor['token'] =  $user->createToken('Token')->plainTextToken;

        return $this->success($odgovor, 'Uspesno registrovanje.');
    }

    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        if($validator->fails()){
            return $this->error('Greska pri validaciji', $validator->errors());
        }

        $user = Auth::user();
        $user->password = bcrypt($request->password);
        $user->save();
        return $this->success(null, 'Uspesno promenjena lozinka.');
    }
}
