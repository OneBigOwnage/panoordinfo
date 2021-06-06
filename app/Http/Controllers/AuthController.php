<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function loginPage()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|exists:users,email',
            'password' => 'required',
        ]);

        if ($validator->fails() || !auth()->attempt($validator->validated())) {
            return back()->with('invalid-username', true);
        }

        return redirect()->route('home');
    }

    public function createUser(Request $request)
    {
        if (auth()->user()->name !== env('INITIAL_USER_NAME')) {
            return back()->with('msg', 'U moet administratorrechten hebben om deze functie te gebruiken!');
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return back()->with('msg', "User {$request->name} successfully created!");
    }
}
