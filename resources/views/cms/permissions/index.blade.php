@extends('layouts.test')

@section('page-content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-table">
                <!-- Table Start -->
                <div class="card-body">
                    <div class="title-header option-title">
                        <h5>Permission List</h5>
                        <form class="d-inline-flex">
                            <a href="{{route('permissions.create')}}" class="align-items-center btn btn-theme d-flex">
                                <i data-feather="plus"></i>Add Permission
                            </a>
                        </form>
                    </div>
                    <div>
                        <div class="table-responsive">
                            <table id="table_id" class="table permission-table all-package theme-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Create At</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($permissions as $permission)

                                    <tr>
                                        <td>{{$permission->id}}</td>
                                        <td>{{$permission->name}}</td>
                                        <td>{{Carbon\Carbon::parse($permission->created_at)->diffForHumans()}}</td>
                                        <td>
                                            <ul>
                                                <li>
                                                    <a href="{{route('permissions.edit', $permission->id)}}">
                                                        <i class="ri-pencil-line"></i>
                                                    </a>
                                                </li>

                                                <li>
                                                    <form action="{{route('permissions.delete', $permission->id)}}" method="POST" onclick="return confirm('Are you sure you want to delete this product?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" style="outline: none; border: none; background: transparent; color: red;">
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