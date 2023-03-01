@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-5 align-self-center">
        <h4 class="page-title">Dashboard</h4>
        <div class="d-flex align-items-center">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Settings</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="row justify-content-start my-1">
    <div class="col-md-2">
        <a href="/settings" class="btn btn-warning text-white">
            <i class="mdi mdi-arrow-left "></i></i> Back
        </a>
    </div>
</div>
<h2 class="primary-bg text-center text-white py-2">Settings</h1>
<div class="row justify-content-evenly my-5 ">
    <div class="col-12">
        <div class="table-responsive">
            <table class="table">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone 1</th>
                    <th>Phone 2</th>
                    <th>Logo</th>
                    <th>Footer Text</th>
                    <th>Action</th>

                </tr>
                <tr>
                    <td>{{$data->name}}</td>
                    <td>{{$data->email}}</td>
                    <td>{{$data->phone1}}</td>
                    <td>{{$data->phone2}}</td>
                    <td><img src="{{asset('upload-data/'.$data->logo)}}" alt="" style="width:70px"></td>
                    <td>{{$data->footer_text}}</td>
                    <td><a href="setting/{{$data->id}}/edit" class="btn btn-success px-2">Edit</a></td>

                </tr>
            </table>
        </div>
    </div>
</div>



@endsection
