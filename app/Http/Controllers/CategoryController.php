<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = CategoryModel::all();
        return view('pages.category.show_category',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.category.create_category');
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
            'name' => 'required'
        ]);
        $data = new CategoryModel();
        $data->name = $request->input('name');
        $data->status = $request->input('status');
        $data->notes = $request->input('notes');
        if($data->save()){
            notify()->success('Good Job! Data saved successfully');
        }else{
            notify()->Error('Error! Something went wrong');
        }
        return redirect('/category');
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
        $data = CategoryModel::find($id);
        return view('pages.category.edit_category',compact('data'));
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
            'name'  => 'required'
        ]);
        $data = CategoryModel::find($id);
        $data->name = $request->input('name');
        $data->status = $request->input('status');
        $data->notes = $request->input('notes');
        if($data->save()){
            notify()->success('Good Job! You have successfully');
        }
        else{
            notify()->error('Error! Something went wrong');
        }
        return redirect('/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = CategoryModel::find($id);
        if($data->delete()){
            notify()->success('Good Job! You have successfully');
            
        }else{
            notify()->error('Error! Something went wrong');
        }
        return redirect()->back();
    }
}
