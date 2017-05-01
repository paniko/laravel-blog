<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegistrationController extends Controller
{
    public function create()
    {
      return view('registration.create');
    }
    public function store()
    {
      //validate
      $this->validate(request(),[
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required|confirmed',
      ]);
      //save users
      $user = User::create([
        'name' => request('name'),
        'email' => request('email'),
        'password' => bcrypt(request('password'))
      ]);
      //Sign in
      auth()->login($user);
      //Redirect
      return redirect()->home();
    }
}
