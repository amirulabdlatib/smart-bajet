<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if(!Auth::attempt($request->only('email','password'))){
            throw ValidationException::withMessages([
                'email'=> ['The creadentials you entered are incorrect']
            ]);
        }

        $request->session()->regenerate();

        return response()->json([
            'message' => 'Login successful',
            'user' => Auth::user()
        ],Response::HTTP_OK);
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:8', 'confirmed']
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password'])
        ]);

        Auth::login($user);

        $request->session()->regenerate();

        return response()->json([
            'message' => 'Register successful',
            'user' => Auth::user()
        ],Response::HTTP_CREATED);
    }
}
