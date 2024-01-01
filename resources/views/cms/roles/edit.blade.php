@extends('layouts.test')

@section('page-content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header-2 d-flex justify-item-between">
                                <h5>Edit Role</h5>
                                <a class="btn btn-primary ms-auto mt-4" type="submit">Update role</a>
                            </div>

                            <form class="theme-form theme-form-2 mega-form" action="{{route('roles.update', $role->id)}}" method="post">
                                @csrf
                                @method('put')
                                <div class="mb-4 row align-items-center">
                                    <label class="form-label-title col-sm-3 mb-0">Name <span class="theme-color">*</span></label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="name" value="{{$role->name}}" placeholder="Role Name" />
                                    </div>
                                </div>
                                <button class="btn btn-primary ms-auto mt-4" type="submit">Update role</button>
                            </form>
                            <div class="mb-3">
                                <h4 class="form-label-title">Permissions</h4>
                            </div>

                            <form class="theme-form theme-form-2 mega-form" action="{{route('roles.permissions.change', $role->name)}}" method="post">
                                @csrf
                                <div class="row g-sm-4 g-2">
                                    <div class="col-xl-6">
                                        <div class="row roles-form">
                                            <div class="col-12">
                                                <ul class="d-flex flex-wrap">
                                                    <li>Assigned :</li>
                                                    @foreach ($assigned_permissions as $assigned_permission)

                                                    <li>
                                                        <form action="" method="POST">
                                                            @csrf
                                                            <input name="permissions[]" class="checkbox_animated checkall" type="checkbox" value="{{$assigned_permission->name}}" id="{{$assigned_permission->name}}" checked />
                                                            <label class="form-check-label m-0" for="{{$assigned_permission->name}}">{{$assigned_permission->name}}</label>
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
                                                    @foreach ($unassigned_permissions as $unassigned_permission)
                                                    <li class="w-fit">
                                                        <input name="permissions[]" class="checkbox_animated checkall6" type="checkbox" id="{{$unassigned_permission->name}}" value="{{$unassigned_permission->name}}" />
                                                        <label class="form-check-label m-0" for="{{$unassigned_permission->name}}">{{$unassigned_permission->name}}</label>
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