@extends('layouts.frontend')
@section('page-content')

<section class="breadscrumb-section pt-0">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-12">
                <div class="breadscrumb-contain">
                    <h2>Shop Category</h2>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="index.html">
                                    <i class="fa-solid fa-house"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Shop Category</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shop Section Start -->
<section class="section-b-space shop-section">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-custome-3">
                <div class="left-box wow fadeInUp">
                    <div class="shop-left-sidebar">
                        <ul class="nav nav-pills mb-3 custom-nav-tab" id="pills-tab" role="tablist">
                            @foreach($categories as $category)
                            <li class="nav-item" role="presentation">
                                
                                <button class="nav-link active" id="pills-vegetables" data-bs-toggle="pill"
                                onclick="window.location.href='{{route('front.category',$category->slug)}}'" type="button" role="tab"
                                    aria-selected="true">{{ucwords($category->name)}}<img src="/frontassets/svg/1/vegetable.svg"
                                        class="blur-up lazyload" alt="">
                                    
                                    </button>
                                
                            </li>
                            @endforeach
                            
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-custome-9">
                <div class="show-button">
                    <div class="filter-button d-inline-block d-lg-none">
                        <a><i class="fa-solid fa-filter"></i> Filter Menu</a>
                    </div>

                    {{-- <div class="top-filter-menu">
                        <div class="category-dropdown">
                            <h5 class="text-content">Sort By :</h5>
                            <div class="dropdown">
                                <button class="dropdown-toggle" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown">
                                    <span>Most Popular</span> <i class="fa-solid fa-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li>
                                        <a class="dropdown-item" id="pop" href="javascript:void(0)">Popularity</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" id="low" href="javascript:void(0)">Low - High
                                            Price</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" id="high" href="javascript:void(0)">High - Low
                                            Price</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" id="rating" href="javascript:void(0)">Average
                                            Rating</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" id="aToz" href="javascript:void(0)">A - Z Order</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" id="zToa" href="javascript:void(0)">Z - A Order</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" id="off" href="javascript:void(0)">% Off - Hight To
                                            Low</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="grid-option d-none d-md-block">
                            <ul>
                                <li class="three-grid">
                                    <a href="javascript:void(0)">
                                        <img src="../assets/svg/grid-3.svg" class="blur-up lazyload" alt="">
                                    </a>
                                </li>
                                <li class="grid-btn d-xxl-inline-block d-none active">
                                    <a href="javascript:void(0)">
                                        <img src="../assets/svg/grid-4.svg"
                                            class="blur-up lazyload d-lg-inline-block d-none" alt="">
                                        <img src="../assets/svg/grid.svg"
                                            class="blur-up lazyload img-fluid d-lg-none d-inline-block" alt="">
                                    </a>
                                </li>
                                <li class="list-btn">
                                    <a href="javascript:void(0)">
                                        <img src="../assets/svg/list.svg" class="blur-up lazyload" alt="">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div> --}}

                    {{-- <div class="filter-category">
                        <ul>
                            @foreach($cat as $catpro)
                            <li>
                                <a href="javascript:void(0)">{{$catpro->name}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div> --}}
                </div>

                <div
                    class="row g-sm-4 g-3 row-cols-xxl-4 row-cols-xl-3 row-cols-lg-2 row-cols-md-3 row-cols-2 product-list-section">
                    @foreach($products as $product)
                            <div>
                                <div class="row m-0">
                                    <div class="col-12 px-0">
                                        <div class="product-box">
                                            <div class="product-image">
                                                <a href="{{route('front.product',$product->slug)}}" target="blank">
                                                    @if($product->getMedia('images')->first())
                                                    <img src="{{$product->getMedia('images')->first()->getFullUrl()}}" alt={{$product->name}}
                                                        class="img-fluid blur-up lazyload" alt="{{$product->name}}">
                                                        @else
                                                        <img src="frontassets/images/bg.jpg" alt="empty image" class="img-fluid blur-up lazyload">
                                                        @endif
                                                </a>
                                                {{-- <ul class="product-option">
                                                    <li data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="View">
                                                        <a href="javascript:void(0)" data-bs-toggle="modal"
                                                            data-bs-target="#view">
                                                            <i data-feather="eye"></i>
                                                        </a>
                                                    </li>
                                        
                                                    <li data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Compare">
                                                        <a href="compare.html">
                                                            <i data-feather="refresh-cw"></i>
                                                        </a>
                                                    </li>
                                        
                                                    <li data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Wishlist">
                                                        <a href="wishlist.html" class="notifi-wishlist">
                                                            <i data-feather="heart"></i>
                                                        </a>
                                                    </li>
                                                </ul> --}}
                                            </div>
                                            <div class="product-detail">
                                                <span class="span-name">{{ucwords($category->name)}}</span>
                                                <a href="{{route('front.product',$product->slug)}}">
                                                    <h5 class="name">{{ucwords($product->name)}}</h5>
                                                
                                                <div class="product-rating mt-2">
                                                    <ul class="rating">
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star"></i>
                                                        </li>
                                                    </ul>
                                                    <span>(4.0)</span>
                                                </div>
                                                
                                                <h6 class="unit">{{ucwords($product->discount_p)}} % OFF</h6>
                                                <h5 class="price"><span class="theme-color">RS {{($product->variants->first()->price) -($product->variants->first()->price * $product->discount_p/100)}} </span> <del>RS {{$product->variants->first()->price}}</del>
                                                </h5>
                                            </a>
                                                {{-- <div class="add-to-cart-box bg-white">
                                                    <button class="btn btn-add-cart addcart-button">Add
                                                        <span class="add-icon bg-light-gray">
                                                            <i class="fa-solid fa-plus"></i>
                                                        </span>
                                                    </button>
                                                    <div class="cart_qty qty-box">
                                                        <div class="input-group bg-white">
                                                            <button type="button" class="qty-left-minus bg-gray"
                                                                data-type="minus" data-field="">
                                                                <i class="fa fa-minus" aria-hidden="true"></i>
                                                            </button>
                                                            <input class="form-control input-number qty-input" type="text"
                                                                name="quantity" value="0">
                                                            <button type="button" class="qty-right-plus bg-gray"
                                                                data-type="plus" data-field="">
                                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </div>
                                        
                                    </div> 
                                </div>
                            </div>
                            @endforeach 


                    

                    

                    
                </div>

                <nav class="custome-pagination">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link" href="javascript:void(0)" tabindex="-1" aria-disabled="true">
                                <i class="fa-solid fa-angles-left"></i>
                            </a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="javascript:void(0)">1</a>
                        </li>
                        <li class="page-item" aria-current="page">
                            <a class="page-link" href="javascript:void(0)">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="javascript:void(0)">3</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="javascript:void(0)">
                                <i class="fa-solid fa-angles-right"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>
@endsection