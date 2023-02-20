@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-5 align-self-center">
        <h4 class="page-title">Admin List</h4>
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
    <div class="card-body">
        <h2 class="primary-bg text-center text-white py-2">Admin List</h1>
        <div class="table-responsive">

            <table id="zero_config" class="table table-striped table-bordered">

                <thead>

                    <tr>

                        <th>#</th>
                        <th> Name</th>
                        <th> Email</th>
                        <th> Phone</th>
                        <th> Group</th>
                        <th> Status</th>
                        <th> Image</th>
                        <th> Date</th>
                        <th> Address</th>
                        <th>Action</th>

                    </tr>

                </thead>

                <tbody>
                    <tr>
                        <th>1</th>
                        <th> Asad</th>
                        <th> asad@gmail.com</th>
                        <th> 03076791417</th>
                        <th> Abc</th>
                        <th> Active</th>
                        <th> Image</th>
                        <th> 23-2300</th>
                        <th> 200 R.B Lathianwala</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                        <th>2</th>
                        <th> Asad2</th>
                        <th> asad@gmail.com</th>
                        <th> 03076791417</th>
                        <th> Abc</th>
                        <th> Active</th>
                        <th> Image</th>
                        <th> 23-2300</th>
                        <th> 200 R.B Lathianwala</th>
                        <th>Action</th>
                    </tr>
                   
                      


                </tbody>

            </table>

        </div>
        

    </div>
</div>
@endsection
