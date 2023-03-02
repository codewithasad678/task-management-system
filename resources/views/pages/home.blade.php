@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-5 align-self-center">
        <h4 class="page-title">Dashboard</h4>
        <div class="d-flex align-items-center">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <!-- column -->
        
        <div class="col-sm-6 col-md-4 col-md-4 col-lg-3">
            <div class="card card-hover">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="">
                            <h4>{{$admin}}</h3>
                            <h3 class="my-2">Admin</h3>
                        </div>
                    </div>
                    <div  class="my-2 text-end">
                        <a href="/admin" class="btn btn-primaryD" >Show Details</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- column -->
        <div class="col-sm-6 col-md-4 col-md-4 col-lg-3">
            <div class="card card-hover">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="">
                            <h4>{{$groups}}</h3>
                            <h3 class="my-2">Groups</h3>
                        </div>
                    </div>
                    <div  class="my-2 text-end">
                        <a href="/group" class="btn btn-primaryD" >Show Details</a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- column -->
        <div class="col-sm-6 col-md-4 col-md-4 col-lg-3">
            <div class="card card-hover">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="">
                            <h3>{{$category}}</h3>
                            <h2 class="my-2">Category</h2>
                        </div>
                    </div>
                    <div  class="my-2 text-end">
                        <a href="/category" class="btn btn-primaryD">Show Details</a>
                    </div>
                </div>
            </div>
        </div>
         <!-- column -->
         <div class="col-sm-6 col-md-4 col-md-4 col-lg-3">
            <div class="card card-hover">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="">
                            <h4>{{$designation}}</h4>
                            <h3 class="my-2">Designation</h3>
                        </div>
                    </div>
                    <div  class="my-2 text-end">
                        <a href="/designation" class="btn btn-primaryD" >Show Details</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- column -->
        <div class="col-sm-6 col-md-4 col-md-4 col-lg-3">
            <div class="card card-hover">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="">
                            <h4>{{$member}}</h4>
                            <h3 class="my-2">Team Member</h3>
                        </div>
                    </div>
                    <div  class="my-2 text-end">
                        <a href="/member" class="btn btn-primaryD">Show Details </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- column -->
         <div class="col-sm-6 col-md-4 col-md-4 col-lg-3">
            <div class="card card-hover">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="">
                            <h4>{{$projects}}</h4>
                            <h3 class="my-2">Projects</h3>
                        </div>
                    </div>
                    <div  class="my-2 text-end">
                        <a href="/projects" class="btn btn-primaryD" >Show Details</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- column -->
         <div class="col-sm-6 col-md-4 col-md-4 col-lg-3">
            <div class="card card-hover">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="">
                            <h4>{{$tasks}}</h3>
                            <h3 class="my-2">Total Taks</h3>
                        </div>
                    </div>
                    <div  class="my-2 text-end">
                        <a href="/tasks" class="btn btn-primaryD" >Show Details</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- column -->
        <div class="col-sm-6 col-md-4 col-md-4 col-lg-3">
            <div class="card card-hover">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="">
                            <h4>{{$pendingtasks}}</h3>
                            <h3 class="my-2">Pending Taks</h3>
                        </div>
                    </div>
                    <div  class="my-2 text-end">
                        <a href="/tasks" class="btn btn-primaryD" >Show Details</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- column -->
        <div class="col-sm-6 col-md-4 col-md-4 col-lg-3">
            <div class="card card-hover">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="">
                            <h4>{{$completetasks}}</h3>
                            <h3 class="my-2">Complete Taks</h3>
                        </div>
                    </div>
                    <div  class="my-2 text-end">
                        <a href="/tasks" class="btn btn-primaryD" >Show Details</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- column -->
        <div class="col-sm-6 col-md-4 col-md-4 col-lg-3">
            <div class="card card-hover">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="">
                            <h4>{{$ProductivityModel}}</h4>
                            <h3 class="my-2">Productivity</h3>
                        </div>
                    </div>
                    <div  class="my-2 text-end">
                        <a href="/productivity" class="btn btn-primaryD" >Show Details</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- column -->
        
        

    </div>
</div>
@endsection
