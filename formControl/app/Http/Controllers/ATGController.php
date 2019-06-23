<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\Input;
use App\User;

class ATGController extends Controller
{
    public function index(){
        
    }
    public function create(){
        return view('form.create');
    }
    public function store(Request $request){
        $request->validate([
            'name'    => 'required|min:2|max:50',
            'email'   => 'required|email|unique:users,email|',
            'pincode' => 'required|numeric|digits_between:6,6',
        ], [
            'name.required' => 'Name is required',
            'name.min' => 'Name must be at least 2 characters.',
            'name.max' => 'Name should not be greater than 50 characters.',
            'email.required' => 'Email is required',
            'email.unique' => 'Email already exists',
            'pincode.required' => 'Pincode is required',
            'pincode.digits_between' => 'Must be 6 digits',
            
        ]);
        $user = new User;        
        $user->name = $request['name'];        
        $user->email = $request['email'];
        $user->pincode = $request['pincode'];           
        $user->save();
        // dd($user->name);
        return redirect()->back()->with('success', 'User created successfully.');

 
    }
}
