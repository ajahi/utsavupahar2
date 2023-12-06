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
                            <h5>Category Information</h5>
                        </div>

                        <form class="theme-form theme-form-2 mega-form" method="POST" action="{{route('category.update',$category)}}">
                            @csrf
                            @method('PUT')
                            <div class="mb-4 row align-items-center">
                                <label class="form-label-title col-sm-3 mb-0">Category Name</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" name="name" value="{{$category ? $category->name : old('name')}}"
                                        placeholder="Category Name">
                                </div>
                            </div>

                            <div class="mb-4 row align-items-center">
                                <label class="form-label-title col-sm-3 mb-0">Parent Category</label>
                                <div class="col-sm-9">
                                    <select name="parent_id" class="form-control" id="">
                                        <option value="">Select Parent Category</option>
                                        @foreach ($categories  as $selected_category )
                                            <option @if($category->id==$selected_category->parent_id) selected @endif value="{{$selected_category->id}}">{{$selected_category->name}}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                            </div>

                            <div class="mb-4 row align-items-center">
                                <label class="col-sm-3 col-form-label form-label-title">Category
                                    Image</label>
                                <div class="form-group col-sm-9">
                                    <div class="dropzone-wrapper">
                                        <div class="dropzone-desc">
                                            <i class="ri-upload-2-line"></i>
                                            <p>Choose an image file or drag it here.</p>
                                        </div>
                                        <input type="file" class="dropzone">
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4 row align-items-center">
                                <div class="col-sm-3 form-label-title">Select Category Icon</div>
                                <div class="col-sm-9">
                                    <div class="dropdown icon-dropdown">
                                        <button class="btn dropdown-toggle" type="button"
                                            id="dropdownMenuButton1" data-bs-toggle="dropdown">
                                            Select Icon
                                        </button>
                                        <ul class="dropdown-menu"
                                            aria-labelledby="dropdownMenuButton1">
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <img src="../assets/svg/1/vegetable.svg"
                                                        class="img-fluid" alt="">
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <img src="../assets/svg/1/cup.svg"
                                                        class="blur-up lazyload" alt="">
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <img src="../assets/svg/1/meats.svg"
                                                        class="img-fluid" alt="">
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <img src="../assets/svg/1/breakfast.svg"
                                                        class="img-fluid" alt="">
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <img src="../assets/svg/1/frozen.svg"
                                                        class="img-fluid" alt="">
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <img src="../assets/svg/1/biscuit.svg"
                                                        class="img-fluid" alt="">
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <img src="../assets/svg/1/grocery.svg"
                                                        class="img-fluid" alt="">
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <img src="../assets/svg/1/drink.svg"
                                                        class="img-fluid" alt="">
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <img src="../assets/svg/1/milk.svg"
                                                        class="img-fluid" alt="">
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <img src="../assets/svg/1/pet.svg"
                                                        class="img-fluid" alt="">
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
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