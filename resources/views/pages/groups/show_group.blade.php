@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-5 align-self-center">
        <h4 class="page-title">Group List</h4>
        <div class="d-flex align-items-center">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Group List</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="row justify-content-end my-1">
    <div class="col-md-2">
        <a href="/group/create">
            Create New 
        </a>
    </div>
</div>
<div class="row mx-0">
    <div class="card-body">
        <h2 class="primary-bg text-center text-white py-2">Group List</h1>
        <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th> Name</th>
                        <th> Status</th>
                        <th> Description</th>
                        <th> Date</th>
                        <th>Action</th>

                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <th>1</th>
                        <th> abc</th>
                        <th> off</th>
                        <th> Note</th>
                        <th> Date</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                        <th>2</th>
                        <th> xyz</th>
                        <th> on</th>
                        <th> Note</th>
                        <th> Date</th>
                        <th>Action</th>
                    </tr>
                </tbody>

            </table>

        </div>
        

    </div>
</div>
@endsection
