<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use App\Models\DesignationModel;
use Illuminate\Http\Request;
use PHPUnit\Framework\Error\Notice;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $data = DesignationModel::select('designation.*')
        ->from('designation')
        ->join('category', 'category.id', '=', 'designation.category_id');
        print_r($data);
        die();
        // $data->category_id = CategoryModel::select('name')->where('id',$data->category_id);
        // return view('pages.designation.show_designation',compact('data','catName'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = CategoryModel::all()->where('status','active');
        return view('pages.designation.create_designation',compact('data'));
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
            'name' =>'required',
            'category' =>'required'
        ]);
        $data = new DesignationModel;
        $data->name = $request->input('name');
        $data->category_id = $request->input('category');
        $data->note = $request->input('note');
        if($data->save()){
            notify()->success('Good Job! You have successfully');
        }else{
            Notify()->error('Error! Something went wrong');
        }
        return redirect('/designation');
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
