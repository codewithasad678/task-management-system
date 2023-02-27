@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-5 align-self-center">
        <h4 class="page-title">Productivity List</h4>
        <div class="d-flex align-items-center">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Productivity List</li>
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
        <a href="/productivity/create" class="btn btn-warning text-white">
            Create <i class="mdi mdi-arrow-right "></i>
        </a>
    </div>
</div>
<div class="row mx-0">
    <div class="card-body">
        <h2 class="primary-bg text-center text-white py-2">productivity List</h1>
        <div class="table-responsive">

            <table id="zero_config" class="table table-striped table-bordered">

                <thead>

                    <tr>

                        <th>#</th>
                        <th> Project</th>
                        <th> Task</th>
                        <th> Subject</th>
                        <th>Status</th>
                        <th> Date</th>
                        <th> Start Time</th>
                        <th> End Time</th>
                        <th> Note</th>
                        <th>Action</th>

                    </tr>

                </thead>

                <tbody>
                    
                @foreach($data as $item)
                    <tr>   
                        <td>{{$item->id}}</td>
                        <td> @foreach($item->get_project as $project) {{ $project->name }}  @endforeach  </td>
                        <td> @foreach($item->get_task  as $task) {{$task->name}} @endforeach </td>
                        <td>  {{$item->subject}} </td>
                        <td> <span class="text-white p-1 px-2 rounded @if($item->status == 'active') {{'bg-success'}} @else {{'bg-danger'}} @endif">{{ucfirst($item->status)}}</span></td>
                        <td>@php echo date('d-m-Y',strtotime($item->date)) @endphp</td>
                        <td>
                           <div class="p-1  my-1">@php echo date('h:m A',strtotime($item->start_time))@endphp</div>
                           
                        </td>
                        <td><div class="p-1 my-1">{{date('h:m A',strtotime($item->end_time))}}</div></td>
                        <td> {!!$item->note!!} </td>
                        <td class="td-20">
                            <div class="btn-group">
                                <a href="/productivity/{{$item->id}}" class="btn-sm pt-2  px-3 btn-info mx-1">Show</a>
                                <a href="/productivity/{{$item->id}}/edit" class="btn-sm pt-2  px-3 btn-success mx-1">Edit</a>
                                
                                <form action="/productivity/{{$item->id}}" onsubmit="return confirm('Are You sure to delete this record?')" method="post">
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
