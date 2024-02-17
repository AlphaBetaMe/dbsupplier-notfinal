<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('personalinfos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            
            'fname' =>['required', 'string', 'max:255'],
            'Mname' =>['required', 'string', 'max:255'],
            'Lname' =>['required', 'string', 'max:255'],
            'bday' =>['required', 'string', 'max:255'],
            'placeofBirth' =>['required', 'string', 'max:255'],
            'cnumber' =>['required', 'string', 'max:255'],
            'homeAdd' =>['required', 'string', 'max:255'],
            'spouseName' =>['required', 'string', 'max:255'],
            'occupation' =>['required', 'string', 'max:255'],
            'alumniID' =>['required', 'string', 'max:255'],
            'yearGrad' =>['required', 'string', 'max:255'],
            'department' =>['required', 'string', 'max:255'],
            'course' =>['required', 'string', 'max:255'],
            'comment' =>['required', 'string', 'max:255'],

        ]);

        $info = Info::create([

            'fname'=>$request->fname,
            'Mname'=>$request->Mname,
            'Lname'=>$request->Lname,
            'bday'=>$request->bday,
            'placeofBirth'=>$request->placeofBirth,
            'cnumber'=>$request->cnumber,
            'homeAdd'=>$request->homeAdd,
            'spouseName'=>$request->spouseName,
            'occupation'=>$request->occupation,
            'alumniID'=>$request->alumniID,
            'yearGrad'=>$request->yearGrad,
            'department'=>$request->department,
            'course'=>$request->course,
            'comment'=>$request->comment,
            

        ]);


        event(new Registered($info));

        Auth::login($user);

        return redirect('mainsite');
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
        //
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
        //
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
