@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-5 align-self-center">
        <h4 class="page-title">Dashboard</h4>
        <div class="d-flex align-items-center">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tasks</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="row justify-content-start my-1">
    <div class="col-md-2">
        <a href="/tasks" class="btn btn-warning text-white">
            <i class="mdi mdi-arrow-left "></i></i> Back
        </a>
    </div>
</div>
<div class="row mx-0">
    <h2 class="primary-bg text-white py-2 text-center">Edit Task</h1>
    <form action="/tasks/{{$data->id}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row justify-content-evenly my-2 bg-white py-1">

            <div class="col-sm-6 p-1 px-2">
                <div class="form-group ">
                    <label for="name" class="form-label"> Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Name" required value="{{$data->name}}">
                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="col-sm-6 p-1 px-2 ">
                <div class="form-group">
                    <label for="project_id">Project  </label>
                    <select  id="project_id" class="form-control"  name="project_id">
                        <option value="">Select Project</option>
                        @foreach($projects as $item)
                            <option value="{{$item->id}}" @if($data->project_id == $item->id){{'selected'}} @endif>{{$item->name}}</option>
                        @endforeach
                    </select>
                   
                </div>
            </div>
            <div class="col-sm-6 p-1 px-2">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group ">
                            <label for="start_date" class="form-label"> Start Date <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="start_date" id="start_date" placeholder="Start Date" required value="{{$data->start_date}}">
                            @error('start_date')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        
                    </div>
                    <div class="col-6">
                        <div class="form-group ">
                            <label for="end_date" class="form-label"> End Date <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="end_date" id="end_date" placeholder="End Date" required value="{{$data->end_date}}">
                            @error('end_date')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
           
            
            <div class="col-sm-6 p-1 px-2 ">
                <div class="form-group">
                    <label for="status">Status </label>
                    <select name="status" id="status" class="form-control" >
                        <option value="">Select Status</option>
                        <option value="active" @if($data->status == 'active'){{'selected'}} @endif>Active</option>
                        <option value="inactive" @if($data->status == 'inactive'){{'selected'}} @endif>Inactive</option>
                    </select>
                    @error('status')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="note">Note</label>
                    <textarea name="note" class="form-control ckeditor" id="note" cols="" rows="3">{{$data->note}}</textarea>
                </div>
            </div>
            
            <div class="col-sm-6 p-1 px-2 ">
                <div class=" d-flex justify-content-center align-items-center">
                    <div class="w-50 mt-4 py-2"><input type="submit" class="btn-sm btn-primary w-100 m-auto rounded" name="image" id="image" value="Update" ></div>
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
