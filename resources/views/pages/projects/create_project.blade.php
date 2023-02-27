@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-5 align-self-center">
        <h4 class="page-title">Dashboard</h4>
        <div class="d-flex align-items-center">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Projects</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="row justify-content-start my-1">
    <div class="col-md-2">
        <a href="/projects" class="btn btn-warning text-white">
            <i class="mdi mdi-arrow-left "></i></i> Back
        </a>
    </div>
</div>
<div class="row mx-0">
    <h2 class="primary-bg text-white py-2">Create Project</h1>
    <form action="/projects" method="post" enctype="multipart/form-data">
        @csrf
        @method('post')
        <div class="row justify-content-evenly my-2 bg-white py-1">

            <div class="col-sm-6 p-1 px-2">
                <input type="hidden" name="action" value="store">
                <div class="form-group ">
                    <label for="name" class="form-label"> Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Name" required value="{{old('name')}}">
                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="col-sm-6 p-1 px-2 " >
                <div class="row justify-content-evenly">
                    <div class="col-sm-6">
                        <div class="form-group ">
                            <label for="start_date" class="form-label"> Start Date <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="start_date" id="start_date"  required value="{{old('start_date')}}">
                            @error('start_date')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group ">
                            <label for="end_date" class="form-label"> End Date <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="end_date" id="end_date"  required value="{{old('end_date')}}">
                            @error('end_date')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            
           
            <div class="col-sm-6 p-1 px-2 ">
                <div class="form-group">
                    <label for="team_id">Project Manager  <span class="text-danger">*</span></label>
                    <select name="admin_id" id="admin_id" class="form-control" required>
                        <option value="">Select Manager</option>
                        @foreach($admins as $item)
                            <option value="{{$item->id}}">{{$item->fname}} {{$item->lname}}</option>
                        @endforeach
                    </select>
                    @error('team_id')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="col-sm-6 p-1 px-2 ">
                <div class="form-group">
                    <label for="category">Category </label>
                    <select  id="category_id" name="category_id" class="form-control"  >
                        <option value="">Select Category</option>
                        @foreach($categories as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                   
                </div>
            </div>
            <div class="col-sm-6 p-1 px-2 ">
                <div class="form-group">
                    <label for="team_id">Team member <span class="text-danger">*</span></label>
                    <select name="team_id[]" id="team_id" class="form-control" required multiple>
                        <option value="">Select Members</option>
                        @foreach($teams as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                    @error('team_id')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>

            <div class="col-sm-6 p-1 px-2 ">
                <div class="form-group">
                    <label for="status">Status </label>
                    <select name="status" id="status" class="form-control" >
                        <option value="">Select Status</option>
                        <option value="pending">Pending</option>
                        <option value="preparing">Preparing</option>
                        <option value="processing">Processing</option>
                        <option value="completed">Completed</option>
                    </select>
                    @error('status')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
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

@section('script')
<script>

    
    function getDesignation(e){
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
        let category_id = e.target.value;
        let ajaxUrl = '{{url("/fetchcategory/")}}/'+ category_id;
        console.log(category_id)
        $.ajax({
            url: ajaxUrl,
            type: "POST",
            dataType:'json',
            data: {
                category_id : category_id
            },
            success : function (data) {
                $("#designation_id").empty();
                $("#designation_id").append('<option value="">Select Designation</option>');
                data.forEach( function (item) {
                    $("#designation_id").append('<option value="'+ item.id + '">'+item.name+'</option>');
                })
                    
            }
        })
    }
</script>
@endsection
