<?php

namespace App\Http\Controllers;


use App\Models\Research;
use App\Models\User;
use App\Notifications\ResearchNotification;
use Illuminate\Support\Facades\Notification;

use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;
use PDF;



class ResearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = User::find(1);
        // $researchs = Research::all();
        if($request->filled('search')){
            $researchs = Research::search($request->search)->get();
        }else{
            $researchs = Research::get();
        }
        return view('researchs.index', compact('researchs', 'user'));
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

        $this->validate($request,[

            'researchTitle' => 'required',
            'researchTitle' => 'required',
            'researchDescriptiom' => 'required',
            'author' => 'required',
            'researchStatus' => 'required',
            'meta_title' => 'required',
            'meta_keywords' => 'required',
            'meta_description' => 'required',
        ]);
        $user = User::all();
        $data = new Research();

        // $file=$request->file;
        // $filename=time().'.'.$file->getClientOriginalExtension();
        // $request->file->move('assets',$filename);
        // $data->file=$filename;

        if($request->hasFile('file'))
        {
            $file = $request->file('file');
            $ext = $file->getClientOriginalExtension();
            $filename = time() .'.'. $ext;
            $file->move('assets', $filename);
            $data->file = $filename;
        }

        $data->researchTitle=$request->researchTitle;
        $data->researchDescription=$request->researchDescription;
        $data->author=$request->author;
        $data->researchStatus=$request->researchStatus;
        $data->meta_title=$request->meta_title;
        $data->meta_keywords=$request->meta_keywords;
        $data->meta_description=$request->meta_description;

        $data->save();
        Notification::send($user, new ResearchNotification($request->researchTitle));
        return redirect()->route('researchs.index')
                        ->with('success', 'Added new research successfully');
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
        $researchs=Research::find($id);

        return view('researchs.edit', compact('researchs'));
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
        $data =Research::find($id);

        // $file=$request->file;
        // $filename=time().'.'.$file->getClientOriginalExtension();
        // $request->file->move('assets',$filename);
        // $data->file=$filename;

        if($request->hasFile('file'))
        {
            $path = 'assets/'.$data->file;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('file');
            $ext = $file->getClientOriginalName();
            $filename = time().'.'.$ext;
            $file->move('assets',$filename);
            $data->file=$filename;
        }

        $data->researchTitle=$request->researchTitle;
        $data->researchDescription=$request->researchDescription;
        $data->author=$request->author;
        $data->researchStatus=$request->researchStatus;
        $data->meta_title=$request->meta_title;
        $data->meta_keywords=$request->meta_keywords;
        $data->meta_description=$request->meta_description;

        $data->save();

        return redirect()->route('researchs.index')
                        ->with('success','Research Updated Successfully');
    }


    public function download($file)
    {
        $file_path = public_path('assets/'.$file);

        
        return response()->download( $file_path);

        // $response =  response()->download( $file_path);
        
        // return $reponse;
    }

   
    public function noticeView($id)
    {
        $notice = Notice::where('id', $id)->firstOrFail();
        $pathToFile = $notice->file;
        $fileName =  $notice->fileName;
        $path = $pathToFile.'/';
        $file = public_path($path.$fileName);
        return response()->file($file);
    }
                
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Research::find($id);
            $path = 'assets/'.$data->file;
            if(File::exists($path))
            {
                File::delete($path);
            }
        
            $data->delete();
            return redirect()->route('researchs.index')
                        ->with('success','Research Deleted Successfully');
    }
}
