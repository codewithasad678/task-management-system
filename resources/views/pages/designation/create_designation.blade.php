@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-5 align-self-center">
        <h4 class="page-title">Dashboard</h4>
        <div class="d-flex align-items-center">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Designation</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="row justify-content-start my-1">
    <div class="col-md-2">
        <a href="/designation" class="btn btn-warning text-white">
            <i class="mdi mdi-arrow-left "></i></i> Back
        </a>
    </div>
</div>
<div class="row mx-0">
    <h2 class="primary-bg text-white py-2">Create Designation</h1>
    <form action="/designation" method="post" enctype="multipart/form-data">
        @csrf
        @method('post')
        <div class="row justify-content-evenly my-2 bg-white py-1">

            <div class="col-sm-6 p-1 px-2">
                <div class="form-group ">
                    <label for="name" class="form-label"> Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Name" required value="{{old('name')}}">
                </div>
            </div>
            <div class="col-sm-6 p-1 px-2 ">
                <div class="form-group">
                    <label for="category">Category <span class="text-danger">*</span></label>
                    <select name="category_id" id="category" class="form-control" required>
                        <option value="">Select</option>
                        @foreach($data as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            
    
            <div class="col-sm-12 p-1 px-2">
                <div class="form-group ">
                    <label for="notes" class="form-label">Notes</label>
                    <textarea class="form-control ckeditor" name="note" id="notes" placeholder="Notes" rows="3">{{old('name')}}</textarea>
                </div>
            </div>
            
            
            <div class="col-sm-6 p-1 px-2 ">
                <div class=" d-flex justify-content-center align-items-center">
                    <div class="w-50 mt-4 py-2"><input type="submit" class="btn-sm btn-primary w-100 m-auto rounded" name="image" id="image" value="Save" ></div>
                </div>
            </div>
    
        </div>
    </form>
</div>
@endsection
