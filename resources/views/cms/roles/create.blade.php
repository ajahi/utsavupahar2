@extends('layouts.test')

@section('page-content')
@if ($errors->any())
<div class="alert alert-secondary">

    @foreach ($errors->all() as $error)
    <p class="primary">{{ $error }}</p>

    @endforeach

</div>
@endif
<div class="row">
    <div class="col-12">
        <div class="row">
            <div class="col-sm-8 m-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header-2">
                            <h5>Role Information</h5>
                        </div>

                        <form class="theme-form theme-form-2 mega-form" method="POST" action="{{route('roles.store')}}">
                            @csrf
                            <div class="mb-4 row align-items-center">
                                <label class="form-label-title col-sm-3 mb-0">Role Name</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" name="name" placeholder="Role Name">
                                </div>
                            </div>

                            <div class="mb-4 row align-items-center">
                                <label class="form-label-title col-sm-3 mb-0">Permissions</label>
                                <div class="col-sm-9">
                                    <select name="permissions[]" class="form-control" id="" multiple>
                                        <option value="">Select Permission to assign to role</option>
                                        @foreach ($permissions as $permission )
                                        <option value="{{$permission->name}}">{{$permission->name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="form-control">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection