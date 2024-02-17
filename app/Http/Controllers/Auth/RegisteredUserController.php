<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\Role;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        
        
        $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'supplierName' => 'required|string|max:255',
        'lname' => 'required|string|max:255',
        'dob' => 'required'|'date'|'before:'.Carbon::now()->subYears(18),
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed', Rules\Password::defaults(),
    ]);
    
  
            
             if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
            $user = User::create([
            'name' => $request->name,
            'supplierName' => $request->supplierName,
            'lname' => $request->lname,
            'dob' => $request->dob,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->roles()->attach(Role::where('name', 'User')->first());
        
        event(new Registered($user));

        Auth::login($user);

        return response()->json(['message' => 'User registered successfully'], 201);
    }
}
