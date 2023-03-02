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
        <a href="/setting" class="btn btn-warning text-white">
            <i class="mdi mdi-arrow-left "></i></i> Back
        </a>
    </div>
</div>
<div class="row mx-0">
    <h2 class="primary-bg text-white py-2 text-center">Edit Project</h1>
    <form action="/setting/{{$data->id}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row justify-content-evenly my-2 bg-white py-1">

            <div class="col-sm-6 p-1 px-2">
                <input type="hidden" name="action" value="store">
                <div class="form-group ">
                    <label for="name" class="form-label"> Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Name" required value="{{$data->name}}">
                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>

            <div class="col-sm-6 p-1 px-2 ">
                <div class="form-group ">
                    <label for="email" class="form-label"> Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" name="email" id="email"  required value="{{$data->email}}">
                    @error('email')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="col-sm-6 p-1 px-2 ">
                <div class="form-group ">
                    <label for="phone1" class="form-label"> Phone 1 <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="phone1" id="phone1"  required value="{{$data->phone1}}">
                    @error('phone1')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>

            <div class="col-sm-6 p-1 px-2 ">
                <div class="form-group ">
                    <label for="phone1" class="form-label"> Phone 2 <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="phone2" id="phone1"  required value="{{$data->phone2}}">
                    @error('phone1')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>

            <div class="col-sm-6 p-1 px-2 ">
                <div class="form-group ">
                    <label for="footer_text" class="form-label"> Logo<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="footer_text" id="footer_text"  required value="{{$data->footer_text}}">
                    @error('footer_text')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            

            <div class="col-sm-6 p-1 px-2 ">
                <div class="form-group ">
                    <label for="logo" class="form-label"> Logo <span class="text-danger">*</span></label>
                    <input type="file" onchange="loadFile(event,'logo_image')" class="form-control" name="logo" id="logo"  required value="{{$data->logo}}">
                    @error('logo')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
                    
          
            
    
            
            
            <div class="col-sm-6 p-1 px-2 ">
                <div class=" d-flex justify-content-center align-items-center">
                    <div class="w-50 mt-4 py-2"><input type="submit" class="btn-sm btn-primary w-100 m-auto rounded" name="image" id="image" value="Update" ></div>
                </div>
            </div>

            <div class="col-sm-6 p-1 px-2 ">
                <img src="{{asset('upload-data/'.$data->logo)}}" alt="logo" style="100px"  id="logo_image">
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
