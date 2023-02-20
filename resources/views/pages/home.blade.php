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
        
        <div class="col-sm-12 col-lg-4">
            <div class="card card-hover">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="">
                            <h3>2</h3>
                            <h2 class="my-2">Admin</h2>
                        </div>
                    </div>
                    <div  class="my-2 text-end">
                        <a href="/admin" >Show Info --></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- column -->
        <div class="col-sm-12 col-lg-4">
            <div class="card card-hover">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="">
                            <h3>0</h3>
                            <h2 class="my-2">Member</h2>
                        </div>
                    </div>
                    <div  class="my-2 text-end">
                        <a href="/member" >Show Info --></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- column -->
        <div class="col-sm-12 col-lg-4">
            <div class="card card-hover">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="">
                            <h3>4</h3>
                            <h2 class="my-2">Category</h2>
                        </div>
                    </div>
                    <div  class="my-2 text-end">
                        <a href="/category" >Show Info --></a>
                    </div>
                </div>
            </div>
        </div>
         <!-- column -->
         <div class="col-sm-12 col-lg-4">
            <div class="card card-hover">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="">
                            <h3>2</h3>
                            <h2 class="my-2">Designation</h2>
                        </div>
                    </div>
                    <div  class="my-2 text-end">
                        <a href="/designation" >Show Info --></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- column -->
         <div class="col-sm-12 col-lg-4">
            <div class="card card-hover">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="">
                            <h3>2</h3>
                            <h2 class="my-2">Projects</h2>
                        </div>
                    </div>
                    <div  class="my-2 text-end">
                        <a href="/projects" >Show Info --></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- column -->
         <div class="col-sm-12 col-lg-4">
            <div class="card card-hover">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="">
                            <h3>5</h3>
                            <h2 class="my-2">Pending Taks</h2>
                        </div>
                    </div>
                    <div  class="my-2 text-end">
                        <a href="/tasks" >Show Info --></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- column -->
        <div class="col-sm-12 col-lg-4">
            <div class="card card-hover">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="">
                            <h3>5</h3>
                            <h2 class="my-2">Complete Taks</h2>
                        </div>
                    </div>
                    <div  class="my-2 text-end">
                        <a href="/tasks" >Show Info --></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- column -->
        <div class="col-sm-12 col-lg-4">
            <div class="card card-hover">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="">
                            <h3>5</h3>
                            <h2 class="my-2">Productivity</h2>
                        </div>
                    </div>
                    <div  class="my-2 text-end">
                        <a href="/productivity" >Show Info --></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- column -->
        
        

    </div>
</div>
@endsection
