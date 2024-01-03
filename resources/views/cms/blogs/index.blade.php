@extends('layouts.test')

@section('page-content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-table">
                <div class="card-body">
                    <div class="title-header option-title d-sm-flex d-block">
                        <h5>Blogs List</h5>
                        <div class="right-options">
                            <div class="m-3">
                                <form action="#" method="get">
                                    <input type="text" name="search" placeholder="Search blogs by id or name" value="{{ request('query') }}">
                                    <button class="form-search" type="submit"><i class="ri-search-line"></i></button>
                                </form>
                                
                            </div>
                            <ul>
                                
                                <li>
                                    <a href="javascript:void(0)">Export</a>
                                </li>
                                <li>
                                    <a class="btn btn-solid" href="{{route('blog.create')}}">Add Blog</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div>
                        <div class="table-responsive">
                            <table class="table all-package theme-table table-product" id="table_id">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Blog Image</th>
                                        <th>Blog Title</th>
                                        <th>Author </th>
                                        <th>Status </th>
                                        
                                        <th>Option</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($blogs as $blog)
                                    
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>
                                            <div class="table-image">
                                                @if($blog->getMedia('images')->first()!==null)
                                                <img src={{$blog->getMedia('images')->first()->getFullUrl()}}>
                                                @else
                                                <img src="{{asset('assets/images/blog/1.png')}}" class="img-fluid"
                                                    alt="{{$blog->name}}">
                                                    
                                                @endif
                                            </div>
                                        </td>

                                        <td>{{$blog->title}}</td>


                                        <td class="td-price"> {{$blog->user->name}}</td>

                                        @if($blog->status=='pending')
                                        <td class="status-danger">
                                            <span>Pending</span>
                                        </td>
                                        @else
                                        <td class="status-close">
                                            <span>Published</span>
                                        </td>
                                        @endif
                                        <td>
                                            <ul>
                                                <li>
                                                    <a href="{{route('blog.show',$blog->id)}}">
                                                        <i class="ri-eye-line"></i>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="{{route('blog.edit',$blog->id)}}">
                                                        <i class="ri-pencil-line"></i>
                                                    </a>
                                                </li>

                                                <li>
                                                    <form action="{{route('blog.delete',$blog->id)}}" method="post" style="display:inline" 
                                                        onclick="return confirm('Are you sure you want to delete this blog?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"> <i class="ri-delete-bin-line"></i></button>
                                                       
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
                {{$blogs->links()}}
            </div>
        </div>
    </div>
</div>
@endsection