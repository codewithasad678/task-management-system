@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-5 align-self-center">
        <h4 class="page-title">Dashboard</h4>
        <div class="d-flex align-items-center">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Productivity</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="row justify-content-start my-1">
    <div class="col-md-2">
        <a href="/productivity" class="btn btn-warning text-white">
            <i class="mdi mdi-arrow-left "></i></i> Back
        </a>
    </div>
</div>
<div class="row mx-0">
    <h2 class="primary-bg text-white py-2">Create Productivity</h1>
    <form action="/productivity" method="post" enctype="multipart/form-data">
        @csrf
        @method('post')
        <div class="row justify-content-evenly my-2 bg-white py-1">

            <div class="col-sm-6 p-1 px-2">
                <input type="hidden" name="action" value="store">
                <div class="form-group ">
                    <label for="name" class="form-label"> Project  <span class="text-danger">*</span></label>
                    
                    <select name="project_id" id="project_id" class="form-control">
                        <option value="">Select Project</option>
                        @foreach($projects as $project)
                            <option value="{{$project->id}}">{{$project->name}}</option>
                        @endforeach
                    </select>
                    @error('project_id')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="col-sm-6 p-1 px-2">
                <div class="form-group ">
                    <label for="name" class="form-label"> Task  <span class="text-danger">*</span></label>
                    
                    <select name="task_id" id="task_id" class="form-control">
                        <option value="">Select Task</option>
                        @foreach($tasks as $task)
                            <option value="{{$task->id}}">{{$task->name}}</option>
                        @endforeach
                    </select>
                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="col-sm-6 p-1 px-2 " >  
                <div class="form-group ">
                    <label for="start_date" class="form-label" > Subject  <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="subject" id="subject"  required value="{{old('subject')}}">
                    @error('subject')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>        
            </div>

            <div class="col-sm-6 p-1 px-2 ">
                <div class="form-group ">
                    <label for="end_date" class="form-label"> Status <span class="text-danger">*</span></label>
                    <select name="status" id="status" class="form-control">
                        <option value="">Select Status</option>
                        <option value="active">Active</option>
                        <option value="inactive">InActive</option>
                    </select>
                    @error('status')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>


            <div class="col-sm-6 p-1 px-2 " >
                <div class="form-group ">
                    <label for="date" class="form-label"> Date  <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" name="date" id="date"  required value="{{old('date')}}">
                    @error('date')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>

            <div class="col-sm-6 p-1 px-2 " >
                <div class="row justify-content-evenly">
                    <div class="col-sm-6">
                        <div class="form-group ">
                            <label for="start_time" class="form-label"> Start Time  <span class="text-danger">*</span></label>
                            <input type="time" class="form-control" name="start_time" id="start_time"  required value="{{old('start_time')}}">
                            @error('start_time')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group ">
                            <label for="end_time" class="form-label"> End Time <span class="text-danger">*</span></label>
                            <input type="time" name="end_time" id="end_time" value="{{old('end_time')}}" class="form-control">
                            @error('end_time')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="form-group mb-3">
                    <label for="note">Note:</label>
                    <textarea name="note" id="note" class="form-control ckeditor" rows="2">{{old('note')}}</textarea>
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

