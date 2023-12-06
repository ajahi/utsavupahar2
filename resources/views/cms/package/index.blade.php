@extends('layouts.test')
@section('page-content')
<div class="row">
    <div class="col-sm-12">
        <div class="card card-table">
            <div class="card-body">
                <div class="title-header option-title">
                    <h5>All Packages</h5>
                    <form class="d-inline-flex">
                        <a href="{{ route('package.create') }}" class="align-items-center btn btn-theme d-flex">
                            <i data-feather="plus-square"></i>Add New
                        </a>
                    </form>
                </div>

                <div class="table-responsive category-table">
                    <table class="table all-package theme-table" id="table_id">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Is Available</th>
                                <th>Option</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($packages as $package)
                            <tr>
                                <td>{{ $package->name }}</td>
                                <td>{{ $package->description }}</td>
                                <td>{{ $package->is_available ? 'Yes' : 'No' }}</td>
                                <td>
                                    <ul>
                                        <li>
                                            <a href="{{ route('package.edit', $package->id) }}">
                                                <i class="ri-pencil-line"></i>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#exampleModalToggle">
                                                <i class="ri-delete-bin-line"></i>
                                            </a>
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
    </div>
</div>
@endsection
