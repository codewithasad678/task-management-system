<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use Illuminate\Hashing\BcryptHasher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use LDAP\Result;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =  AdminModel::all();
        return view('pages.admin.show_admin',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.create_admin');
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
            'fname' => 'required|string',
            'email' => 'required|email|',
            'phone' => 'required',
            'password' => 'required',
            'cpassword' => 'required|same:password',
            'group' => 'required'
        ]);
        $data = new AdminModel();
        $data->fname = $request->input('fname');
        $data->lname = $request->input('lname');
        $data->email = $request->input('email');
        $data->phone = $request->input('phone');
        $data->address = $request->input('address');
        $data->password = Hash::make($request->input('password'));
        $data->textpassword = $request->input('password');
        $data->group = $request->input('group');
        $data->status = $request->input('status');

        if(!is_null($request->file('image'))){
            $file = $request->file('image');
            $ext = $file->getClientOriginalName();
            $id = $request->id + 1;
            $filename = strtotime(now())."_profile_{$id}_".$ext;
            if($file->move("upload-data/",$filename)){
                $data->image = $filename;
            }
        }
        
        $data->save();
        $data = AdminModel::all();
        return view('pages.admin.show_admin',compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
        $record = AdminModel::find($id);
        $record->delete();
        return redirect()->back(); 
    }
}
