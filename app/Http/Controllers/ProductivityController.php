<?php

namespace App\Http\Controllers;
use App\Models\ProductivityModel;
use App\Models\ProjectsModel;
use App\Models\TaskModel;
use Illuminate\Http\Request;

class ProductivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ProductivityModel::all();
        return view('pages.productivity.show_productivity',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = ProjectsModel::all();
        $tasks = TaskModel::all();
        return view('pages.productivity.create_productivity',compact('projects','tasks'));
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
            'project_id' => 'required',
            'task_id' => 'required',
            'subject' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        $data = new ProductivityModel();
        $data->project_id = $request->input('project_id');
        $data->task_id = $request->input('task_id');
        $data->subject = $request->input('subject');
        $data->status = $request->input('status');
        $data->date = $request->input('date');
        $data->start_time = $request->input('start_time');
        $data->end_time = $request->input('end_time');
        $data->note = $request->input('note');
        if($data->save()){
            notify()->success('Good Job! Data saved successfully');
        }else{
            notify()->error('Error! Something went wrong');
        }
        return redirect('/productivity');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = ProductivityModel::where('id', $id)->with('get_task')->with('get_project')->first();
        return view('pages.productivity.show_productivity_profile',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = ProductivityModel::find($id);
        $projects = ProjectsModel::all();
        $tasks = TaskModel::all();
        return view('pages.productivity.edit_productivity', compact('data', 'projects','tasks'));
       
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
            'project_id' => 'required',
            'task_id' => 'required',
            'subject' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        $data = ProductivityModel::find($id);
        $data->project_id = $request->input('project_id');
        $data->task_id = $request->input('task_id');
        $data->subject = $request->input('subject');
        $data->status = $request->input('status');
        $data->date = $request->input('date');
        $data->start_time = $request->input('start_time');
        $data->end_time = $request->input('end_time');
        $data->note = $request->input('note');
        if($data->save()){
            notify()->success('Good Job! Updated saved successfully');
        }else{
            notify()->error('Error! Something went wrong');
        }
        return redirect('/productivity');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = ProductivityModel::find($id);
        if($data->delete()){
            notify()->success('Good Job! Data deleted successfully');
        }else{
            notify()->success('Error! Soemthing deleted successfully');
        }
        return redirect()->back();
    }
}
