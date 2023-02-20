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
<div class="row mx-0">
    <h2 class="primary-bg text-white py-2">Create Admin</h1>
    <form action="/admin" method="post" enctype="multipart/form-data">
        @csrf
        @method('store')
        <div class="row justify-content-evenly my-2 bg-white py-1">

            <div class="col-sm-4 p-1 px-2">
                <div class="form-group ">
                    <label for="fname" class="form-label">First Name</label>
                    <input type="text" class="form-control" name="fname" id="fname" placeholder="First Name">
                </div>
            </div>
    
            <div class="col-sm-4 p-1 px-2">
                <div class="form-group ">
                    <label for="lname" class="form-label">Last Name</label>
                    <input type="text" class="form-control" name="lname" id="lname" placeholder="last Name">
                </div>
            </div>
            
            <div class="col-sm-4 p-1 px-2">
                <div class="form-group ">
                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="email" id="email" placeholder="Email">
                </div>
            </div>

            <div class="col-sm-6 p-1 px-2">
                <div class="form-group ">
                    <label for="phone" class="form-label">Phone <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone">
                </div>
            </div>

            <div class="col-sm-6 p-1 px-2">
                <div class="form-group ">
                    <label for="address" class="form-label">Address </label>
                    <input type="text" class="form-control" name="address" id="address" placeholder="Address">
                </div>
            </div>

            <div class="col-sm-6 p-1 px-2">
                <div class="form-group ">
                    <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="password" id="password" placeholder="Password">
                </div>
            </div>

            <div class="col-sm-6 p-1 px-2">
                <div class="form-group ">
                    <label for="cpassword" class="form-label">Confirm Password <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="cpassword" id="cpassword" placeholder="Confirm Password">
                </div>
            </div>
            <div class="col-sm-6 p-1 px-2">
                <div class="form-group ">
                    <label for="image" class="form-label">Image </label>
                    <input type="file" class="form-control" name="image" id="image" >
                </div>
            </div>
            <div class="col-sm-6 p-1 px-2 ">
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="statys" class="form-control">
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
                <div style="width:150px"><img src="images/avater.jpg" alt="profile Image" style="width:100%"></div>
            </div>
    
        </div>
    </form>
</div>
@endsection
