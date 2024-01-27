@extends('layouts.frontend')
@section('page-content')
<section class="breadscrumb-section pt-0">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-12">
                <div class="breadscrumb-contain">
                    <h2>Blog List</h2>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="index.html">
                                    <i class="fa-solid fa-house"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Blog List</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Blog Section Start -->
<section class="blog-section section-b-space">
    <div class="container-fluid-lg">
        <div class="row g-4">
            <div class="col-xxl-9 col-xl-8 col-lg-7 order-lg-2">
                <div class="row g-4">
                    @foreach ($blogs as $blog)

                    <div class="col-12">
                        <div class="blog-box blog-list wow fadeInUp">
                            <div class="blog-image">
                                <img src="{{$blog->getMedia('images')->first()->getFullUrl()}}" class="blur-up lazyload" width="250" alt="">
                            </div>

                            <div class="blog-contain blog-contain-2">
                                <div class="blog-label">
                                    <span class="time"><i data-feather="clock"></i> <span>{{$blog->created_at->format('D M, Y')}}</span></span>
                                    <span class="super"><i data-feather="user"></i> <span>{{$blog->user->name}}</span></span>
                                </div>
                                <a href="blog-detail.html">
                                    <h3>{{$blog->title}}</h3>
                                </a>
                                <p> {{ strip_tags(Str::limit($blog->content, 20))}}</p>
                                <a href="{{route('blog.show', $blog->id)}}" class="blog-button">Read
                                    More <i class="fa-solid fa-right-long"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <nav class="custome-pagination">
                    <ul class="pagination justify-content-center">
                        <!-- <li class="page-item disabled">
                            <a class="page-link" href="javascript:void(0)" tabindex="-1">
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
                        </li> -->
                        {{$blogs->links()}}
                    </ul>
                </nav>
            </div>

            <div class="col-xxl-3 col-xl-4 col-lg-5 order-lg-1">
                <div class="left-sidebar-box wow fadeInUp">
                    <div class="left-search-box">
                        <div class="search-box">
                            <input type="search" class="form-control" id="exampleFormControlInput1" placeholder="Search....">
                        </div>
                    </div>

                    <div class="accordion left-accordion-box" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                    Recent Post
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                                <div class="accordion-body pt-0">
                                    <div class="recent-post-box">
                                        @foreach ($latest_posts as $latest)

                                        <div class="recent-box">
                                            <a href="{{route('blog.show', $latest->id)}}" class="recent-image">
                                                <img src="{{$latest->getMedia('images')->first()->getFullUrl()}}" class="img-fluid blur-up lazyload" width="50" alt="">
                                            </a>

                                            <div class="recent-detail">
                                                <a href="blog-detail.html">
                                                    <h5 class="recent-name">{{$latest->title}}</h5>
                                                </a>
                                                <h6>{{$latest->created_at->format('d M, Y')}} <i data-feather="thumbs-up"></i></h6>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                    Category
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse collapse show" aria-labelledby="panelsStayOpen-headingTwo">
                                <div class="accordion-body p-0">
                                    <div class="category-list-box">
                                        <ul>
                                            @foreach ($categories as $category)

                                            <li>
                                                <a href="{{route('front.category', $category->slug)}}">
                                                    <div class="category-name">
                                                        <h5>{{$category->name}}</h5>
                                                        <span>{{$category->products()->count()}}</span>
                                                    </div>
                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                    Product Tags
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse collapse show" aria-labelledby="panelsStayOpen-headingThree">
                                <div class="accordion-body pt-0">
                                    <div class="product-tags-box">
                                        <ul>

                                            <li>
                                                <a href="javascript:void(0)">Fruit Cutting</a>
                                            </li>

                                            <li>
                                                <a href="javascript:void(0)">Meat</a>
                                            </li>

                                            <li>
                                                <a href="javascript:void(0)">organic</a>
                                            </li>

                                            <li>
                                                <a href="javascript:void(0)">cake</a>
                                            </li>

                                            <li>
                                                <a href="javascript:void(0)">pick fruit</a>
                                            </li>

                                            <li>
                                                <a href="javascript:void(0)">backery</a>
                                            </li>

                                            <li>
                                                <a href="javascript:void(0)">organix food</a>
                                            </li>

                                            <li>
                                                <a href="javascript:void(0)">Most Expensive Fruit</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false" aria-controls="panelsStayOpen-collapseFour">
                                    Trending Products
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse collapse show" aria-labelledby="panelsStayOpen-headingFour">
                                <div class="accordion-body">
                                    <ul class="product-list product-list-2 border-0 p-0">
                                        @foreach ($trending_products as $product)

                                        <li>
                                            <div class="offer-product">
                                                <a href="shop-left-sidebar.html" class="offer-image">
                                                    <img src="{{$product->getMedia('images')->first()?->getFullUrl()}}" class="blur-up lazyload" alt="">
                                                </a>

                                                <div class="offer-detail">
                                                    <div>
                                                        <a href="shop-left-sidebar.html">
                                                            <h6 class="name">{{$product->name}}</h6>
                                                        </a>
                                                        <span>{{$product->weight}} KG</span>
                                                        <h6 class="price theme-color">$ {{$product->purchase_price}}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection