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
<div class="row justify-content-end my-1">
    <div class="col-md-2 text-end">
        <a href="/admin/create" class="btn btn-warning text-white">
             Create <i class="mdi mdi-arrow-right "></i>
        </a>
    </div>
</div>
<div class="row mx-0">
    <div class="card-body">
        <h2 class="primary-bg text-center text-white py-2">Admin List</h1>
        <div class="table-responsive">

            <table id="zero_config" class="table table-striped table-bordered">

                <thead>

                    <tr>

                        <th class="td-5">Sr.#</th>
                        <th width="" >Admin Name</th>
                        <th class="td-20"> Email</th>
                        <th class="td-10"> Phone</th>
                        <th class="td-10"> Group</th>
                        <th class="td-10"> Status</th>
                        <th class="td-10"> Image</th>
                        <th class="td-15"> Date</th>
                        <th class="td-30"> Address</th>
                        <th class="td-20">Action</th>

                    </tr>

                </thead>

                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td class="td-5">{{$item->id}}</td>
                        <td width=""> {{$item->fname}} {{$item->lname}}</td>
                        <td class="td-20"> {{$item->email}}</td>
                        <td class="td-20">{{$item->phone}}</td>
                        <td class="td-10"> {{$item->group}}</td>
                        <td class="td-10"> {{ucfirst($item->status)}}</td>
                        <td class="td-10"><img src="upload-data/{{$item->image}}" style="width: 150px" alt="Profile image"></td>
                        <td class="td-10">{{$item->created_at}}</td>
                        <td class="td-30"> {{$item->address}}</td>
                        <td class="td-20">
                            <div class="btn-group">
                                <a href="/admin/{{$item->id}}" class="btn-sm  px-3 btn-success mx-1">Edit</a>
                                <form action="/admin/{{$item->id}}" onsubmit="return confirm('Are You sure to delete this record?')" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="action" value="destroy">
                                    <input type="submit" class="btn btn-danger" value="Delete">
                                    </form>
                            </div>
                        </td>
                    </tr>

                </tbody>

            </table>

        </div>
        

    </div>
</div>
@endsection
