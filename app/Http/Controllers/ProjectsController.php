<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use App\Models\CategoryModel;
use App\Models\ProjectsModel;
use App\Models\TeamModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ProjectsModel::with('get_category')->with('get_admin')->with('get_team')->get();
        // $results = DB::table('team')
        //         ->whereIn('id', $data->team_id)
        //         ->get();
        // dd($data->toArray()[0]['team_id']);
        return view('pages.projects.show_projects',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = CategoryModel::where('status','active')->get();
        $teams = TeamModel::where('status','active')->get();
        $admins = AdminModel::where('status','1')->get();
        return view('pages.projects.create_project',compact('categories','teams','admins'));
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
            'start_date' => 'required',
            'end_date' => 'required',
            'admin_id' => 'required',
            'category_id' => 'required',
            'team_id' => 'required',
        ]);

        $data = new ProjectsModel();
        $data->name = $request->input('name');
        $data->start_date = $request->input('start_date');
        $data->end_date = $request->input('end_date');
        $data->admin_id = $request->input('admin_id');
        $data->category_id = $request->input('category_id');
        $data->team_id = json_encode($request->input('team_id'));
        $data->status = $request->input('status');
        $data->note = $request->input('note');
        if($data->save()){
            notify()->success('Good Job! Data saved successfully');
        }else{
            notify()->success('Error! Something went wrong');
        }
        return redirect('/projects');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = ProjectsModel::with('get_category')->with('get_admin')->with('get_team')->where('id', $id)->get();
        // dd($data->toArray());
        return view('pages.projects.show_project_profile',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = ProjectsModel::find($id);
        $categories = CategoryModel::where('status','active')->get();
        $teams = TeamModel::where('status','active')->get();
        $admins = AdminModel::where('status','1')->get();
        return view('pages.projects.edit_project',compact('data','categories','teams','admins'));
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
            'start_date' => 'required',
            'end_date' => 'required',
            'admin_id' => 'required',
            'category_id' => 'required',
            'team_id' => 'required',
        ]);

        $data = ProjectsModel::find($id);
        $data->name = $request->input('name');
        $data->start_date = $request->input('start_date');
        $data->end_date = $request->input('end_date');
        $data->admin_id = $request->input('admin_id');
        $data->category_id = $request->input('category_id');
        $data->team_id = json_encode($request->input('team_id'));
        $data->status = $request->input('status');
        $data->note = $request->input('note');
        if($data->save()){
            notify()->success('Good Job! Data Updated successfully');
        }else{
            notify()->success('Error! Something went wrong');
        }
        return redirect('/projects');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = ProjectsModel::find($id);
        if($data->delete()){
            notify()->success('Good Job! Record added successfully');
        }
        else{
            notify()->error('Error! Record deleted successfully');
        }

        return redirect()->back();
    }
}
