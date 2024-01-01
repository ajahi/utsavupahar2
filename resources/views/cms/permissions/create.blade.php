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
                            <h5>Permission Information</h5>
                        </div>

                        <form class="theme-form theme-form-2 mega-form" method="POST" action="{{route('permissions.store')}}">
                            @csrf
                            <div class="mb-4 row align-items-center">
                                <label class="form-label-title col-sm-3 mb-0">Permission Name</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" name="name" placeholder="Permission Name">
                                </div>
                            </div>

                            <div class="mb-4 row align-items-center">
                                <label class="form-label-title col-sm-3 mb-0">Roles</label>
                                <div class="col-sm-9">
                                    <select name="roles[]" class="form-control" id="" multiple>
                                        <option value="">Select Roles to assign this permission to</option>
                                        @foreach ($roles as $role )
                                        <option value="{{$role->name}}">{{$role->name}}</option>
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