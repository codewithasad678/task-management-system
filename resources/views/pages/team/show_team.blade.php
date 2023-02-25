@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-5 align-self-center">
        <h4 class="page-title">Team List</h4>
        <div class="d-flex align-items-center">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Team List</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="notify-div">
    <x:notify-messages />
</div>
<div class="row justify-content-end my-1">
    <div class="col-md-2 text-end">
        <a href="/team/create" class="btn btn-warning text-white">
            Create <i class="mdi mdi-arrow-right "></i>
        </a>
    </div>
</div>
<div class="row mx-0">
    <div class="card-body">
        <h2 class="primary-bg text-center text-white py-2">Team List</h1>
        <div class="table-responsive">

            <table id="zero_config" class="table table-striped table-bordered">

                <thead>

                    <tr>

                        <th>#</th>
                        <th> Name</th>
                        <th> Email</th>
                        <th> Phone</th>
                        <th> Designation</th>
                        <th> Status</th>
                        <th> Created</th>
                        <th>Action</th>

                    </tr>

                </thead>

                <tbody>
                    
                @foreach($data as $item)
                    <tr>   
                        <td>{{$item->id}}</td>
                        <td> {{$item->name}}</td>
                        <td> {{ $item->email }}  </td>
                        <td> {{ $item->phone }}  </td>
                        <td>
                            @foreach($item->get_desigantion as $designation)
                            {{$designation->name}}
                            @endforeach
                        </td>
                        <td> <span class="text-white p-1 rounded @if($item->status == 'active') {{'bg-success'}} @else {{'bg-danger'}} @endif">{{ucfirst($item->status)}}</span></td>
                        <td> {{date('d-m-Y',strtotime($item->created_at))}}</td>
                        <td class="td-20">
                            <div class="btn-group">
                                <a href="/team/{{$item->id}}/edit" class="btn-sm pt-2  px-3 btn-success mx-1">Edit</a>
                                
                                <form action="/team/{{$item->id}}" onsubmit="return confirm('Are You sure to delete this record?')" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="action" value="destroy">
                                    <input type="submit" class="btn btn-danger" value="Delete">
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>

        </div>
        

    </div>
</div>
@endsection
