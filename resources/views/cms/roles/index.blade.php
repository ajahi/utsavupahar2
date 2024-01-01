@extends('layouts.test')

@section('page-content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-table">
                <!-- Table Start -->
                <div class="card-body">
                    <div class="title-header option-title">
                        <h5>Role List</h5>
                        <form class="d-inline-flex">
                            <a href="{{route('roles.create')}}" class="align-items-center btn btn-theme d-flex">
                                <i data-feather="plus"></i>Add Role
                            </a>
                        </form>
                    </div>
                    <div>
                        <div class="table-responsive">
                            <table id="table_id" class="table role-table all-package theme-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Create At</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($roles as $role)

                                    <tr>
                                        <td>{{$role->id}}</td>
                                        <td>{{$role->name}}</td>
                                        <td>{{Carbon\Carbon::parse($role->created_at)->diffForHumans()}}</td>
                                        <td>
                                            <ul>
                                                <li>
                                                    <a href="{{route('roles.edit', $role->id)}}">
                                                        <i class="ri-pencil-line"></i>
                                                    </a>
                                                </li>

                                                <li>
                                                    <form action="{{route('roles.delete', $role->id)}}" method="POST" onclick="return confirm('Are you sure you want to delete this product?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button  type="submit" style="outline: none; border: none; background: transparent; color: red;">
                                                            <i class="ri-delete-bin-line"></i>
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Table End -->
            </div>
        </div>
    </div>
</div>
@endsection