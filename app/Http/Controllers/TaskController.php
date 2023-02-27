<?php

namespace App\Http\Controllers;

use App\Models\ProjectsModel;
use App\Models\TaskModel;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = TaskModel::with('get_project')->get();

        return view('pages.tasks.show_task',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = ProjectsModel::all();
        return view('pages.tasks.create_task',compact('data'));
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
            'name' => 'required',
            'project_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $data = new TaskModel();
        $data->name = $request->input('name');
        $data->project_id = $request->input('project_id');
        $data->start_date = $request->input('start_date');
        $data->end_date = $request->input('end_date');
        $data->status = $request->input('status');
        $data->note = $request->input('note');
        if($data->save()){
            notify()->success('Good Job! Data saved successfully');
        }else{
            notify()->error('Error! Something went wrong');
        }
        return redirect('/tasks');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = TaskModel::where('id',$id)->with('get_project')->first();
        // dd($data->toArray());
        return view('pages.tasks.show_task_profile',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = TaskModel::find($id);
        $projects = ProjectsModel::all();
        return view('pages.tasks.edit_task',compact('data','projects'));
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
            'name' => 'required',
            'project_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $data = TaskModel::find($id);
        $data->name = $request->input('name');
        $data->project_id = $request->input('project_id');
        $data->start_date = $request->input('start_date');
        $data->end_date = $request->input('end_date');
        $data->status = $request->input('status');
        $data->note = $request->input('note');
        if($data->save()){
            notify()->success('Good Job! Data Updated successfully');
        }else{
            notify()->error('Error! Something went wrong');
        }
        return redirect('/tasks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $date = TaskModel::find($id);
        if($date->delete()){
            notify()->success('Good Job! Record Deleted successfully');
        }else{
            notify()->success('Error! Something went wrong');
        }
        return redirect()->back();
    }
}
