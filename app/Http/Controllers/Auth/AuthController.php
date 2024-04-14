<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // Validation
        $request->validate([
            'name' => 'required|string',
            "email" => "required|string|email|unique:users",
            'password' => 'required|confirmed' // password_confirmation
        ]);

        // Create User
        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt($request->password)
        ]);

        return response()->json([
            "status" => true,
            "message" => "User registered successfully",
            "data" => []
        ]);
    }

    public function login(Request $request)
    {
        $request->validate([
            "email" => "required|email|string",
            "password" => "required"
        ]);
        $user = User::where("email", $request->email)->first();
        if (!empty($user)) {
            if(Hash::check($request->password, $user->password)){
                $token = $user->createToken("mytoken")->accessToken;
                return response()->json([
                    "status" => true,
                    "message" => "Login successful",
                    "data" => [
                        "token" => $token
                    ]
                ]);
            }else{
                return response()->json([
                    "status" => false,
                    "message" => "Password didn't match",
                    "data" => []
                ]);
            }
        } else {
            return response()->json([
                "status" => false,
                "message" => "Invalid Email value",
                "data" => []
            ]);
        }
        
    }  
    
    public function profile()
    {
        $userData = auth()->user();
        return response()->json([
            "status" => true,
            "message" => "Profile information",
            "data" => $userData
        ]);
    }

    public function logout(){
        $token = auth()->user()->token();
        $token->revoke();
        return response()->json([
            "status" => true,
            "message" => "User Logged out successfully",
            "data" => []
        ]);
    }
}
