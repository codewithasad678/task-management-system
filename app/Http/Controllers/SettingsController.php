<?php

namespace App\Http\Controllers;

use App\Models\SettingsModel;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = SettingsModel::all();
        $data = $data[0];
        // dd($data->toArray());
        return view('pages.settings.settings',compact('data'));

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
        $data = SettingsModel::find($id);
            // $data = $data[0];
        // dd($data->toArray());
        return view('pages.settings.edit_settings',compact('data'));
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
        $data = SettingsModel::find($id);
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->phone1 = $request->input('phone1');
        $data->phone2 = $request->input('phone2');
        $data->footer_text = $request->input('footer_text');


        if(!is_null($request->file('logo'))){
            $file = $request->file('logo');
            $ext = $file->getClientOriginalName();
            $id = $request->id + 1;
            $filename = strtotime(now())."_profile_{$id}_".$ext;
            if($file->move("upload-data/",$filename)){
                $data->logo = $filename;
            }
        }
        if($data->save()){
            notify()->success('Good Job! Updated Successfully');
        }else{
            notify()->success('Error! something went wrong');
        }
        return redirect('/setting');
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
