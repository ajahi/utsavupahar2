@extends('layouts.test')

@section('page-content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-table">
                <div class="card-body">
                    <div class="title-header option-title d-sm-flex d-block">
                        <h5>Products List</h5>
                        <div class="right-options">
                            <div class="m-3">
                                <form action="#" method="get">
                                    <input type="text" name="search" placeholder="Search products by id or name" value="{{ request('query') }}">
                                    <button class="form-search" type="submit"><i class="ri-search-line"></i></button>
                                </form>

                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="table-responsive">
                            <table class="table all-package theme-table table-product" id="table_id">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>User Image</th>
                                        <th>User Name</th>
                                        <th>Roles</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($users as $user)

                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>
                                            <div class="table-image">
                                                @if($user->getMedia('images')->first()!==null)
                                                <img src={{$product->getMedia('images')->first()->getFullUrl()}}>
                                                @else
                                                <img src="{{asset('assets/images/user/1.png')}}" class="img-fluid" alt="{{$user->name}}">

                                                @endif
                                            </div>
                                        </td>

                                        <td>{{$user->name}}</td>

                                        {{-- <td class="justify-start">
                                            <form class="theme-form theme-form-2 mega-form" action="{{route('users.assign_role', $user->id)}}" method="post">
                                        @csrf
                                        <div class="roles-form">
                                            <ul>
                                                @foreach ($roles as $role)
                                                <li>
                                                    @if ($user->hasRole($role->name))
                                                    <input onchange="this.form.submit()" class="checkbox_animated checkall" name="roles[]" type="checkbox" value="{{$role->name}}" id="{{$role->name}}" checked />
                                                    @else
                                                    <input onchange="this.form.submit()" class="checkbox_animated checkall" name="roles[]" type="checkbox" value="{{$role->name}}" id="{{$role->name}}" />
                                                    @endif
                                                    <label class="form-check-label m-0" for="{{$role->name}}">{{$role->name}}</label>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        </form>


                                        </td> --}}
                                        <td class="justify-start">
                                            <form class="theme-form theme-form-2 mega-form d-flex gap-2" action="{{route('users.assign_role', $user->id)}}" method="post">
                                                @csrf
                                                <select name="roles[]" class="form-control">
                                                    <option value="">Select roles to assign</option>
                                                    @foreach ($roles as $role)
                                                    <option value="{{$role->name}}" {{ $user->hasRole($role->name) ? 'selected' : ""}}>
                                                        {{$role->name}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                <button type="submit" class="btn btn-sm btn-primary">Assign</button>
                                            </form>


                                        </td>
                                        {{--<td>
                                            <form class="theme-form theme-form-2 mega-form" action="{{route('users.assign_permission', $user->id)}}" method="post">
                                        @csrf
                                        <div class="roles-form">
                                            <ul>
                                                @foreach ($permissions as $permission)
                                                <li>
                                                    @if ($user->can($permission->name))
                                                    <input onchange="this.form.submit()" class="checkbox_animated checkall" name="permissions[]" type="checkbox" value="{{$permission->name}}" id="{{$permission->name}}" checked />
                                                    @else
                                                    <input onchange="this.form.submit()" class="checkbox_animated checkall" name="permissions[]" type="checkbox" value="{{$permission->name}}" id="{{$permission->name}}" />
                                                    @endif
                                                    <label class="form-check-label m-0" for="{{$permission->name}}">{{$permission->name}}</label>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        </form>

                                        </td>--}}

                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                {{$users->links()}}
            </div>
        </div>
    </div>
</div>
@endsection