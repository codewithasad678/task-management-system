<?php

namespace App\Http\Controllers;

use App\Models\GroupModel;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = GroupModel::all();
        return view('pages.groups.show_group',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.groups.create_group');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data  = new GroupModel();

        $request->validate([
            'name' => 'required',
        ]);
        $data->name = $request->input('name');
        $data->status = $request->input('status');
        $data->description = $request->input('description');
        $data->permissions = json_encode($request->input('permissions'));
        if($data->save()){
            notify()->success('Good  Job ! Data Added Successfully');
        }else{
            notify()->error('Something went wrong! Try again');
        }
        $data = GroupModel::all();
        return view('pages.groups.show_group',compact('data'));
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
        $data = GroupModel::find($id);
        return view('pages.groups.edit_group',compact('data'));
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
        $request->validate([
            'name' => 'required'
        ]);

        $data = GroupModel::find($id);
        $data->name = $request->input('name');
        $data->status = $request->input('status');
        $data->description = $request->input('description');
        $data->permissions = json_encode($request->input('permissions'));
       
        if($data->save()){
            notify()->success('Good Job! Updated Successfully');
        }else{
            notify()->error('Something went wrong');
        }
        $data = GroupModel::all();
        return redirect('/group');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = GroupModel::find($id);
        if(!is_null($data)){
            $data->delete();
            notify()->success('Good Job! Data deleted successfully');
        }
        else{
            notify()->success('Something went wrong');
        }
        // $data = GroupModel::all();
        // return view('pages.groups.show_group',compact('data'));
        return redirect()->back();
    }
}
