<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Timeline;
use App\Models\Product;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class TimelineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $timelines = Timeline::with('comments')->where('user_id', Auth::id())->get();
        $services = Product::all();
       

        return view('timelines.index', compact('timelines','services'));
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
        $timelines = new Timeline();
        $timelines->description=$request->Input('description');
        $timelines->user_id = Auth::id();
        if($request->hasFile('image_1'))
        {
            $file = $request->file('image_1');
            $ext = $file->getClientOriginalExtension();
            $filename = time() .'.'. $ext;
            $file->move('assets/uploads/timelines/', $filename);
            $timelines->image_1 = $filename;
        }
        if($request->hasFile('image_2'))
        {
            $file = $request->file('image_2');
            $ext = $file->getClientOriginalExtension();
            $filename = time() .'.'. $ext;
            $file->move('assets/uploads/timelines/', $filename);
            $timelines->image_2 = $filename;
        }
        if($request->hasFile('image_3'))
        {
            $file = $request->file('image_3');
            $ext = $file->getClientOriginalExtension();
            $filename = time() .'.'. $ext;
            $file->move('assets/uploads/timelines/', $filename);
            $timelines->image_3 = $filename;
        }

        $timelines->save();

        return redirect()->route('timelines.index')
                        ->with('success','Timeline Added Successfully');
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
        $timelines = Timeline::find($id);
        return view('timelines.edit', compact('timelines'));
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
        $timelines = Timeline::findOrFail($id);

        $timelines->description=$request->Input('description');
        $timelines->user_id = Auth::id();
        if($request->hasFile('image_1'))
        {
            $path = 'assets/uploads/timelines/'.$timelines->image_1;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('image_1');
            $ext = $file->getClientOriginalName();;
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/timelines',$filename);
            $timelines->image_1=$filename;
        }
        if($request->hasFile('image_2'))
        {
            $path = 'assets/uploads/timelines/'.$timelines->image_2;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('image_2');
            $ext = $file->getClientOriginalName();;
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/timelines',$filename);
            $timelines->image_2=$filename;
        }
        if($request->hasFile('image_3'))
        {
            $path = 'assets/uploads/timelines/'.$timelines->image_3;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('image_3');
            $ext = $file->getClientOriginalName();;
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/timelines',$filename);
            $timelines->image_3=$filename;
        }
        
        $timelines->update();

        return redirect()->route('timelines.index')
                        ->with('success','Timeline Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Timeline::find($id)->delete();
        return redirect()->route('timelines.index')
                        ->with('success','Timeline Deleted Successfully');
    }
}
