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
                        <div class="m-r-10">
                            <span>Wallet Balance</span>
                            <h4>$3,567.53</h4>
                        </div>
                        <div class="ml-auto">
                            <div style="max-width:130px; height:15px;" class="m-b-40">
                                <canvas id="balance"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- column -->
        <div class="col-sm-12 col-lg-4">
            <div class="card card-hover">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="m-r-10">
                            <span>Referral Earnings</span>
                            <h4>$769.08</h4>
                        </div>
                        <div class="ml-auto">
                            <div class="" id="ravenue"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- column -->
        <div class="col-sm-12 col-lg-4">
            <div class="card card-hover">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="m-r-10">
                            <span>Estimated Sales</span>
                            <h4>5769</h4>
                        </div>
                        <div class="ml-auto">
                            <div class="gaugejs-box">
                                <canvas id="foo" class="gaugejs" height="50" width="100">guage</canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
