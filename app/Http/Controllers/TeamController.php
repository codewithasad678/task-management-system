<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use App\Models\DesignationModel;
use App\Models\GroupModel;
use App\Models\TeamModel;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = TeamModel::with('get_desigantion')->get();
        return view('pages.team.show_team',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = CategoryModel::where('status','active')->get();
        $designations = DesignationModel::all();
        return view('pages.team.create_team',compact('categories','designations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);

         $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'designation_id' => 'required',
        ]);

        $data  =  new TeamModel();
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->phone = $request->input('phone');
        $data->designation_id = $request->input('designation_id');
        $data->status = $request->input('status');

        if(!is_null($request->file('image'))){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = strtotime(date('d-m-Y')). "_team_image.".$ext;
            if($file->move('upload-data/',$filename)){
                $data->image = $filename;
            }
        }

        $data->save();

        return redirect('/team');

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
        $data = TeamModel::find($id);
        $categories = CategoryModel::where('status','active')->get();
        $designations = DesignationModel::all();
        return view('pages.team.edit_team',compact('data','categories','designations'));
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
            'email' => 'required',
            'phone' => 'required',
            'designation_id' => 'required',
        ]);

        $data  = TeamModel::find($id);
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->phone = $request->input('phone');
        $data->designation_id = $request->input('designation_id');
        $data->status = $request->input('status');

        if(!is_null($request->file('image'))){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = strtotime(date('d-m-Y')). "_team_image.".$ext;
            if($file->move('upload-data/',$filename)){
                $data->image = $filename;
            }
        }

        $data->save();

        return redirect('/team');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = TeamModel::find($id);
        if($data->delete()){
            notify()->success('Good Job! Record Deleted successfully');
        }else{
            notify()->error('Error! Something went wrong');
        }
        return redirect()->back();
    }


    public function category($id){
        $data = DesignationModel::where('category_id',$id)->get();
        return response()->json($data);
    }
}
