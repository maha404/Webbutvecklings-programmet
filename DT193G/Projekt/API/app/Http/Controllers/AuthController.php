<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // GET

    // REGISTER USER
    public function register (Request $request) {
        $validatedUser = Validator::make ( // Before registering the user some validation is done
            $request->all(), [
                'username' => ['required', 'unique:users,username'], // Username is required and has to be unique in the column 'username'       
                'email' => ['required', 'email', 'unique:users,email'], // Email is required and has to be uniquie in the column 'email'
                'password' => [
                    'required', // Password is required
                    Password::min(8)->letters()->numbers()->mixedCase()->symbols() /* The password has to be at least 8 characters, needs to have bot letters and numbers, 
                                                                                    have at least one uppercase and one lowercase character and a symbol */
                ],
                'password_confirmation' => ['required', 'same:password'] // The password needs to be the same as the password above and is required
            ]
        );
        // If validation fails there will be an error message displayed 
        if($validatedUser->fails()) {
            return response()->json([
                'message' => 'Validation error', 
                'error' => $validatedUser->errors()
            ], 401);
        }

        $user = User::create([ // If the validation is correct the data will be put in the database and create a user
            'username' => $request['username'], 
            'email' => $request['email'], 
            'password' => bcrypt($request['password']) // Hashing the password
        ]);

        $response = [
            'message' => 'Användare skapad', 
            'user' => $user, 
            'token' => $user->createToken('APITOKEN')->plainTextToken // Creates an API token so the user can later log in
        ];

        return response ($response, 201);
    }

    // LOG IN
    public function login(Request $request) {
        $validatedUser = Validator::make( // Checks so all the data is recived/filled in
            $request->all(), [
                'username' => 'required', // Username is required
                'email' => 'required|email', // Email is required and has to be formatted as an email
                'passowrd' => 'requied' // Password is required
            ]
            );
            
            if($validatedUser->fails()) { // If the above validation fails an error message will be displayed
                return response()->json([
                    'message' => 'Validation error', 
                    'error' => $validatedUser->errors()
                ], 401);
            }

            // If the user information can not be foud in the database another error message will be displayed
            if(!auth()->attempt($request->only('username', 'email', 'password'))) {
                return response()->json([
                    'message' => 'Invalid username/email/password'
                ], 401);
            }

            $user = User::where('username', $request->username)->first(); // Checks the database for the user iformation, the first username that matches

            return response()->json([
                'message' => 'Loggade in', 
                'token' => $user->createToken('APITOKEN')->plainTextToken
            ], 200);
    }
    
    // LOG OUT
    public function logout(Request $request) {
        // Removes the logged in users current token
        $request->user()->currentAccessToken()->delete();

        return response()->json([ // Message that the user has logged out
            'message' => 'User logged out'
        ], 200);
    }

}
