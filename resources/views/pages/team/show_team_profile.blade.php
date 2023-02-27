@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-5 align-self-center">
        <h4 class="page-title">Dashboard</h4>
        <div class="d-flex align-items-center">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Team Member</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="row justify-content-start my-1">
    <div class="col-md-2">
        <a href="/team" class="btn btn-warning text-white">
            <i class="mdi mdi-arrow-left "></i></i> Back
        </a>
    </div>
</div>
<h2 class="primary-bg text-center text-white py-2">Team Member</h1>
<div class="row justify-content-evenly my-5 ">
    <div class="col-3">
        <div class="w-75"> 
            <img src="{{asset('upload-data/'.$data->image)}}" style="width:100%;border:1px solid black;padding:5px" alt="">
        </div>
    </div>
    <div class="col-8">
        <div class="row justify-content-evenly">
            <div class="col-6">
                <div class="personal">
                    <div class="d-flex jusitfy-content-between">
                        <h5>Name: </h5>
                        <p class="ps-3">{{$data->name}}</p>
                    </div>
                    <div class="d-flex jusitfy-content-between">
                        <h5>Email: </h5>
                        <p class="ps-3">{{$data->email}}</p>
                    </div>
                    <div class="d-flex jusitfy-content-between">
                        <h5>Phone: </h5>
                    <p class="ps-3">{{$data->phone}}</p>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <h5>Designation:   </h5>
                <p>@foreach($data->get_desigantion as $designation)
                    {{$designation->name}}
                    @endforeach </p>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-evenly my-5">
    <div class="col-3">
        <div class="">
            <h5>Created At:</h5>
            <p>@php echo  date('d-m-Y h:s A',strtotime($data->created_at)) @endphp</p>
        </div>
    </div>
    <div class="col-8">
        <div class="row justify-content-evenly">
            <div class="col-6">
                <div class="">
                    <h5>Updated At:</h5>
                    <p>@php echo  date('d-m-Y h:s A',strtotime($data->updated_at)) @endphp</p>
                </div>
            </div>
            <div class="col-6">
                <h5>Status:   </h5>
                <p><span class="text-white p-1 px-5 rounded @if($data->status == 'active') {{'bg-success'}} @else {{'bg-danger'}} @endif">{{ucfirst($data->status)}}</span></p>
            </div>
        </div>
    </div>
</div>


@endsection
