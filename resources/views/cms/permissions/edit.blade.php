@extends('layouts.test')

@section('page-content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header-2">
                                <h5>Edit Permission</h5>
                            </div>

                            <form class="theme-form theme-form-2 mega-form" action="{{route('permissions.update', $permission->id)}}" method="post">
                                @csrf
                                @method('put')
                                <div class="mb-4 row align-items-center">
                                    <label class="form-label-title col-sm-3 mb-0">Name <span class="theme-color">*</span></label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="name" value="{{$permission->name}}" placeholder="Role Name" />
                                    </div>
                                </div>
                                <button class="btn btn-primary ms-auto mt-4" type="submit">Update Permission</button>
                            </form>
                            <div class="mb-3">
                                <h4 class="form-label-title">Roles: </h4>
                            </div>

                            <form class="theme-form theme-form-2 mega-form" action="{{route('permissions.roles.change', $permission->name)}}" method="post">
                                @csrf
                                <div class="row g-sm-4 g-2">
                                    <div class="col-xl-6">
                                        <div class="row roles-form">
                                            <div class="col-12">
                                                <ul class="d-flex flex-wrap">
                                                    <li>Assigned :</li>
                                                    @foreach ($assigned_roles as $assigned_role)

                                                    <li>
                                                        <input name="roles[]" class="checkbox_animated checkall" type="checkbox" value="{{$assigned_role->name}}" id="{{$assigned_role->name}}" checked />
                                                        <label class="form-check-label m-0" for="{{$assigned_role->name}}">{{$assigned_role->name}}</label>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-6">
                                        <div class="row roles-form">
                                            <div class="col-12">
                                                <ul class="d-flex flex-wrap">
                                                    <li>Unassigned :</li>
                                                    @foreach ($unassigned_roles as $unassigned_role)
                                                    <li>
                                                        <input name="roles[]" class="checkbox_animated checkall6" type="checkbox" id="{{$unassigned_role->name}}" value="{{$unassigned_role->name}}" />
                                                        <label class="form-check-label m-0" for="{{$unassigned_role->name}}">{{$unassigned_role->name}}</label>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-primary ms-auto mt-4" type="submit">Update permissions</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection