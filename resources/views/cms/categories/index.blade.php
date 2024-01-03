@extends('layouts.test')
@section('page-content')

<div class="row">
    <div class="col-sm-12">
        <div class="card card-table">
            <div class="card-body">
                <div class="title-header option-title">
                    <h5>All Category</h5>
                    <div id="notify-container" data-dynamic-message="Dynamic Message Here"></div>

                    <form class="d-inline-flex">
                        <a href="{{route('category.create')}}" class="align-items-center btn btn-theme d-flex">
                            <i data-feather="plus-square"></i>Add New
                        </a>
                    </form>
                </div>

                <div class="table-responsive category-table">
                    <div>
                        <table class="table all-package theme-table" id="table_id">
                            <thead>
                                <tr>
                                    <th>Category Name</th>
                                    <th>Date</th>
                                    <th>Product Image</th>
                                    <th>Icon</th>
                                    <th>Slug</th>
                                    <th>Option</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category->name }}</td>

                                    <td>{{ $category->created_at->format('d-m-Y') }}</td>

                                    <td>
                                        <div class="table-image">
                                            @if($category->getMedia('images')->first()!==null)
                                            <img src={{$category->getMedia('images')->first()->getFullUrl()}}>
                                            @endif
                                        </div>
                                    </td>

                                    <td>
                                        <div class="category-icon">
                                            <img src="../assets/svg/1/vegetable.svg" class="img-fluid" alt="">
                                        </div>
                                    </td>

                                    <td>{{ $category->slug }}</td>

                                    <td>
                                        <ul>
                                            <li>
                                                <a href="order-detail.html">
                                                    <i class="ri-eye-line"></i>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="{{route('category.edit',$category)}}">
                                                    <i class="ri-pencil-line"></i>
                                                </a>
                                            </li>

                                            <li>
                                                <form action="{{route('category.delete',$category)}}" method="post" style="display:inline" onclick="return confirm('Are you sure you want to delete this category?');">
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
        </div>
    </div>
</div>

@endsection