@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-5 align-self-center">
        <h4 class="page-title">Dashboard</h4>
        <div class="d-flex align-items-center">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Admin</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="row justify-content-start my-1">
    <div class="col-md-2">
        <a href="/admin" class="btn btn-warning text-white">
            <i class="mdi mdi-arrow-left "></i></i> Back
        </a>
    </div>
</div>
<div class="row mx-0">
    <h2 class="primary-bg text-white py-2">Create Admin</h1>
    <form action="/admin" method="post" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="row justify-content-evenly my-2 bg-white py-1">

            <div class="col-sm-4 p-1 px-2">
                <div class="form-group ">
                    <label for="fname" class="form-label">First Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="fname" id="fname" placeholder="First Name" value="{{old('fname')}}">
                    @error('fname')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
    
            <div class="col-sm-4 p-1 px-2">
                <div class="form-group ">
                    <label for="lname" class="form-label">Last Name</label>
                    <input type="text" class="form-control" name="lname" id="lname" placeholder="last Name" value="{{old('lname')}}">

                </div>
            </div>
            
            <div class="col-sm-4 p-1 px-2">
                <div class="form-group ">
                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="{{old('email')}}" >
                    @error('email')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>

            <div class="col-sm-6 p-1 px-2">
                <div class="form-group ">
                    <label for="phone" class="form-label">Phone <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="phone" id="phone" placeholder="phone" value="{{old('phone')}}">
                    @error('phone')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>

            <div class="col-sm-6 p-1 px-2">
                <div class="form-group ">
                    <label for="address" class="form-label">Address </label>
                    <input type="text" class="form-control" name="address" id="address" placeholder="Address" value="{{old('address')}}">

                </div>
            </div>

            <div class="col-sm-6 p-1 px-2">
                <div class="form-group ">
                    <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="password" id="password" placeholder="Password">
                    @error('password')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>

            <div class="col-sm-6 p-1 px-2">
                <div class="form-group ">
                    <label for="cpassword" class="form-label">Confirm Password <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="cpassword" id="cpassword" placeholder="Confirm Password" >
                    @error('cpassword')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="col-sm-6 p-1 px-2">
                <div class="form-group ">
                    <label for="image" class="form-label">Image </label>
                    <input type="file" onchange="document.getElementById('profileImage').src = window.URL.createObjectURL(this.files[0])" class="form-control" name="image" id="image" >
                </div>
            </div>
            <div class="col-sm-6 p-1 px-2 ">
                <div class="form-group">
                    <label for="group">Group <span class="text-danger">*</span></label>
                    <select name="group" id="statys" class="form-control" value="{{old('group')}}">
                        <option value="">Select</option>
                        @foreach($groups as $group)
                            <option value="{{$group->id}}">{{$group->name}}</option>
                        @endforeach
                    </select>
                </div>
                @error('group')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col-sm-6 p-1 px-2 ">
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="statys" class="form-control" value="{{old('status')}}">
                        <option value="">Select</option>
                        <option value="active">Active</option>
                        <option value="inactive">InActive</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-6 p-1 px-2 ">
                <div class=" d-flex justify-content-center align-items-center">
                    <div class="w-50 mt-4 py-2"><input type="submit" class="btn-sm btn-primary w-100 m-auto rounded" name="image" id="image" value="Save" ></div>
                </div>
            </div>

            <div class="col-sm-12 p-1 px-2  ">
                <div style="width:150px"><img src="images/avater.jpg" id="profileImage" alt="profile Image" style="width:100%"></div>
            </div>
    
        </div>
    </form>
</div>
@endsection
