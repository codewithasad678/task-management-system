@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-5 align-self-center">
        <h4 class="page-title">Dashboard</h4>
        <div class="d-flex align-items-center">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Group</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="row justify-content-start my-1">
    <div class="col-md-2">
        <a href="/group" class="btn btn-warning text-white">
            <i class="mdi mdi-arrow-left "></i></i> Back
        </a>
    </div>
</div>
<div class="row mx-0">
    <h2 class="primary-bg text-white py-2">Create Group</h1>
    <form action="/group" method="post" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="row justify-content-evenly my-2 bg-white py-1">

            <div class="col-sm-6 p-1 px-2">
                <div class="form-group ">
                    <label for="name" class="form-label"> Name <span class="text-danger">*</span> </label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Name" required value="{{old('name')}}">
                </div>
            </div>
            <div class="col-sm-6 p-1 px-2 ">
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="statys" value="{{old('status')}}" class="form-control">
                        <option value="">Select</option>
                        <option value="active">Active</option>
                        <option value="inactive">InActive</option>
                    </select>
                </div>
            </div>
    
            <div class="col-sm-12 p-1 px-2">
                <div class="form-group ">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" name="description" id="description" placeholder="description" rows="3" >{{old('Description')}}</textarea>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="row justify-content-evenly">
                    <div class="col-3">
                        <h5 class="text-center">Permissions</h5> 
                        Check All <input type="checkbox" onchange="checkAll(event)" name="permissions[checkall]" >
                    </div>
                    <div class="col-2">
                        <h5 class="text-center">Create</h5>
                    </div>
                    <div class="col-2">
                        <h5 class="text-center">Show</h5>
                    </div>
                    <div class="col-2">
                        <h5 class="text-center">Update</h5>
                    </div>
                    <div class="col-2">
                        <h5 class="text-center">Delete</h5>
                    </div>
        
                </div>
                <hr>
                @php $perr = ['dashboard','admin','group','category','team','projects','tasks','productivity','reports','setting']; @endphp
                @foreach($perr as $key => $value)
                <div class="row justify-content-evenly">
                    <div class="col-3">
                        <h5 class="">{{ucfirst($value)}}</h5>
                    </div>
                    <div class="col-2">
                        <h5 class="text-center"><input type="checkbox" name="permissions[{{$value}}][create]"  @if( isset($per[$value]['create']) && $per[$value]['create'] == 'on') {{'checked'}} @endif></h5>
                    </div>
                    <div class="col-2">
                        <h5 class="text-center"><input type="checkbox" name="permissions[{{$value}}][show]"  @if(isset($per[$value]['show']) && $per[$value]['show'] == 'on') {{'checked'}} @endif></h5>
                    </div>
                    <div class="col-2">
                        <h5 class="text-center"><input type="checkbox" name="permissions[{{$value}}][update]"  @if(isset($per[$value]['update']) && $per[$value]['update'] == 'on') {{'checked'}} @endif></h5>
                    </div>
                    <div class="col-2">
                        <h5 class="text-center"><input type="checkbox" name="permissions[{{$value}}][delete]"  @if(isset($per[$value]['delete']) && $per[$value]['delete'] == 'on') {{'checked'}} @endif></h5>
                    </div>
        
                </div><hr>
                @endforeach 
                {{-- <div class="row justify-content-evenly">
                    <div class="col-3">
                        <h5 class="">Dashboard</h5>
                    </div>
                    <div class="col-2">
                        <h5 class="text-center"><input type="checkbox" name="permissions[dashboard][create]"></h5>
                    </div>
                    <div class="col-2">
                        <h5 class="text-center"><input type="checkbox" name="permissions[dashboard][show]"></h5>
                    </div>
                    <div class="col-2">
                        <h5 class="text-center"><input type="checkbox" name="permissions[dashboard][update]"></h5>
                    </div>
                    <div class="col-2">
                        <h5 class="text-center"><input type="checkbox" name="permissions[dashboard][delete]"></h5>
                    </div>
        
                </div><hr>
                <div class="row justify-content-evenly">
                    <div class="col-3">
                        <h5 class="">Admin</h5>
                    </div>
                    <div class="col-2">
                        <h5 class="text-center"><input type="checkbox" name="permissions[admin][create]"></h5>
                    </div>
                    <div class="col-2">
                        <h5 class="text-center"><input type="checkbox" name="permissions[admin][show]"></h5>
                    </div>
                    <div class="col-2">
                        <h5 class="text-center"><input type="checkbox" name="permissions[admin][update]"></h5>
                    </div>
                    <div class="col-2">
                        <h5 class="text-center"><input type="checkbox" name="permissions[admin][delete]"></h5>
                    </div>
        
                </div><hr>
                <div class="row justify-content-evenly">
                    <div class="col-3">
                        <h5 class="">Group</h5>
                    </div>
                    <div class="col-2">
                        <h5 class="text-center"><input type="checkbox" name="permissions[group][create]"></h5>
                    </div>
                    <div class="col-2">
                        <h5 class="text-center"><input type="checkbox" name="permissions[group][show]"></h5>
                    </div>
                    <div class="col-2">
                        <h5 class="text-center"><input type="checkbox" name="permissions[group][update]"></h5>
                    </div>
                    <div class="col-2">
                        <h5 class="text-center"><input type="checkbox" name="permissions[group][delete]"></h5>
                    </div>
        
                </div><hr>

                <div class="row justify-content-evenly">
                    <div class="col-3">
                        <h5 class="">Category</h5>
                    </div>
                    <div class="col-2">
                        <h5 class="text-center"><input type="checkbox" name="permissions[category][create]"></h5>
                    </div>
                    <div class="col-2">
                        <h5 class="text-center"><input type="checkbox" name="permissions[category][show]"></h5>
                    </div>
                    <div class="col-2">
                        <h5 class="text-center"><input type="checkbox" name="permissions[category][update]"></h5>
                    </div>
                    <div class="col-2">
                        <h5 class="text-center"><input type="checkbox" name="permissions[category][delete]"></h5>
                    </div>
        
                </div> <hr>
                <div class="row justify-content-evenly">
                    <div class="col-3">
                        <h5 class="">Team Member</h5>
                    </div>
                    <div class="col-2">
                        <h5 class="text-center"><input type="checkbox" name="permissions[team_member][create]"></h5>
                    </div>
                    <div class="col-2">
                        <h5 class="text-center"><input type="checkbox" name="permissions[team_member][show]"></h5>
                    </div>
                    <div class="col-2">
                        <h5 class="text-center"><input type="checkbox" name="permissions[team_member][update]"></h5>
                    </div>
                    <div class="col-2">
                        <h5 class="text-center"><input type="checkbox" name="permissions[team_member][delete]"></h5>
                    </div>
        
                </div> <hr>
                <div class="row justify-content-evenly">
                    <div class="col-3">
                        <h5 class="">Projects</h5>
                    </div>
                    <div class="col-2">
                        <h5 class="text-center"><input type="checkbox" name="permissions[projects][create]"></h5>
                    </div>
                    <div class="col-2">
                        <h5 class="text-center"><input type="checkbox" name="permissions[projects][show]"></h5>
                    </div>
                    <div class="col-2">
                        <h5 class="text-center"><input type="checkbox" name="permissions[projects][update]"></h5>
                    </div>
                    <div class="col-2">
                        <h5 class="text-center"><input type="checkbox" name="permissions[projects][delete]"></h5>
                    </div>
        
                </div> <hr>
                <div class="row justify-content-evenly">
                    <div class="col-3">
                        <h5 class="">Tasks</h5>
                    </div>
                    <div class="col-2">
                        <h5 class="text-center"><input type="checkbox" name="permissions[tasks][create]"></h5>
                    </div>
                    <div class="col-2">
                        <h5 class="text-center"><input type="checkbox" name="permissions[tasks][show]"></h5>
                    </div>
                    <div class="col-2">
                        <h5 class="text-center"><input type="checkbox" name="permissions[tasks][update]"></h5>
                    </div>
                    <div class="col-2">
                        <h5 class="text-center"><input type="checkbox" name="permissions[tasks][delete]"></h5>
                    </div>
        
                </div> <hr>
                <div class="row justify-content-evenly">
                    <div class="col-3">
                        <h5 class="">Productivity</h5>
                    </div>
                    <div class="col-2">
                        <h5 class="text-center"><input type="checkbox" name="permissions[productivity][create]"></h5>
                    </div>
                    <div class="col-2">
                        <h5 class="text-center"><input type="checkbox" name="permissions[productivity][show]"></h5>
                    </div>
                    <div class="col-2">
                        <h5 class="text-center"><input type="checkbox" name="permissions[productivity][update]"></h5>
                    </div>
                    <div class="col-2">
                        <h5 class="text-center"><input type="checkbox" name="permissions[productivity][delete]"></h5>
                    </div>
        
                </div> <hr>
                <div class="row justify-content-evenly">
                    <div class="col-3">
                        <h5 class="">Reports</h5>
                    </div>
                    <div class="col-2">
                        <h5 class="text-center"><input type="checkbox" name="permissions[reports][create]"></h5>
                    </div>
                    <div class="col-2">
                        <h5 class="text-center"><input type="checkbox" name="permissions[reports][show]"></h5>
                    </div>
                    <div class="col-2">
                        <h5 class="text-center"><input type="checkbox" name="permissions[reports][update]"></h5>
                    </div>
                    <div class="col-2">
                        <h5 class="text-center"><input type="checkbox" name="permissions[reports][delete]"></h5>
                    </div>
        
                </div> <hr>
                <div class="row justify-content-evenly">
                    <div class="col-3">
                        <h5 class="">Settings</h5>
                    </div>
                    <div class="col-2">
                        <h5 class="text-center"><input type="checkbox" name="permissions[setting][create]"></h5>
                    </div>
                    <div class="col-2">
                        <h5 class="text-center"><input type="checkbox" name="permissions[setting][show]"></h5>
                    </div>
                    <div class="col-2">
                        <h5 class="text-center"><input type="checkbox" name="permissions[setting][update]"></h5>
                    </div>
                    <div class="col-2">
                        <h5 class="text-center"><input type="checkbox" name="permissions[setting][delete]"></h5>
                    </div>
        
                </div>  --}}
            </div>
            
            
            <div class="col-sm-6 p-1 px-2 ">
                <div class=" d-flex justify-content-center align-items-center">
                    <div class="w-50 mt-4 py-2"><input type="submit" class="btn-sm btn-primary w-100 m-auto rounded" name="image" id="image" value="Save" ></div>
                </div>
            </div>
    
        </div>
        
    </form>
</div>
@endsection


@section('script')
<script>
        function checkAll(e){
            let value = e.target.checked;
            if(value){
                $('input[type=checkbox]').attr('checked', true);
            }else{
                $('input[type=checkbox]').attr('checked', false);
            }
        }
</script>
@endsection
