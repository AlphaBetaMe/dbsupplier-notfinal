<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        return view('users.userProfile',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::find(Auth::user()->id);
        return view('users.userupdatePassword',compact('users'));
    }
 
 
    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required|min:8|confirmed',
        ], 
        [
            'newpassword.confirmed' => 'The new password confirmation does not match.',
        ]);

        // Get the authenticated user
        $user = Auth::user();

        // Check if the old password matches the user's current password
        if (!Hash::check($request->oldpassword, $user->password)) {
            return redirect()->back()->with('error', 'The old password is incorrect.');
        }

        // Update the user's password
        $user->update([
            'password' => Hash::make($request->newpassword),
        ]);

        return redirect()->back()->with('success', 'Password updated successfully.');
      
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user();

        if($request->hasFile('image'))
        {
            $path = 'assets/uploads/profile/'.$user->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalName();;
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/profile/',$filename);
            $user->image=$filename;
        }
        
        $user->name=$request->Input('name');
        $user->supplierName=$request->Input('supplierName');
        $user->email=$request->Input('email');
        $user->lname=$request->Input('lname');
        $user->phone=$request->Input('phone');
        $user->address1=$request->Input('address1');
        $user->address2=$request->Input('address2');
        $user->city=$request->Input('city');
        $user->state=$request->Input('state');
        $user->country=$request->Input('country');
        $user->pincode=$request->Input('pincode');

        $user->update();

        return redirect()->route('users.userProfile')->with('success', 'Profile Updated Successfully');
    }

    public function editprofile()
    {
        $user = Auth::user();
        
        return view('admin.users.myprofile', compact('user'));
    }

    public function updateprofile(Request $request, $id)
    {
        $user = Auth::user();

        if($request->hasFile('image'))
        {
            $path = 'assets/uploads/profile/'.$user->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalName();;
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/profile/',$filename);
            $user->image=$filename;
        }
        
        $user->name=$request->Input('name');
        $user->supplierName=$request->Input('supplierName');
        $user->email=$request->Input('email');
        $user->lname=$request->Input('lname');
        $user->phone=$request->Input('phone');
        $user->address1=$request->Input('address1');
        $user->address2=$request->Input('address2');
        $user->city=$request->Input('city');
        $user->state=$request->Input('state');
        $user->country=$request->Input('country');
        $user->pincode=$request->Input('pincode');

        $user->update();

        return redirect()->back()->with('success', 'Profile Updated Successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
