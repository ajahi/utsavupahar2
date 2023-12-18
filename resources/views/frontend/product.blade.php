@extends('layouts.frontend')

@section('page-content')
<section class="breadscrumb-section pt-0">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-12">
                
                <div class="breadscrumb-contain">
                    <h2>{{$product->name}}</h2>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="index.html">
                                    <i class="fa-solid fa-house"></i>
                                </a>
                            </li>

                            <li class="breadcrumb-item active">{{$product->name}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Left Sidebar Start -->
<section class="product-section">
    <div class="container-fluid-lg">
        <div class="row g-4">
            <div class="col-xl-6">
                <div class="product-left-box">
                    <div class="row g-sm-4 g-2">

                        @if($product->getMedia('images')!==0)
                        
                            @foreach($product->getMedia('images') as $images)
                            <div class="col-6 col-grid-box wow fadeInUp" data-wow-delay="{{rand(0.02,0.15)}}">
                                <div class="slider-image">
                                    <img src={{$images->getFullUrl()}} id="img-1"
                                        data-zoom-image="{{$images->first()->getFullUrl()}}" class="img-fluid image_zoom_cls-0 blur-up lazyload" alt="">
                                </div>
                            </div>
                            @endforeach

                        @else
                        <img src="/frontassets/images/cake/product/4.png" alt="Assigned no-image">
                        @endif
                       
                    </div>
                </div>
            </div>

            <div class="col-xl-6">
                <div class="right-box-contain p-sticky wow fadeInUp">
                    @if($product->discount_p)
                    <h6 class="offer-top">{{$product->discount_p}} %</h6>
                    @endif
                    <h2 class="name">{{ucwords($product->name)}}</h2>
                    {{-- <div class="price-rating">
                        <h3 class="theme-color price">{{}} <del class="text-content">RS {{}}</del> <span
                                class="offer theme-color">(8% off)</span></h3>
                        <div class="product-rating custom-rate">
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
                            <span class="review">23 Customer Review</span>
                        </div>
                    </div> --}}

                    
                    
                    
                    
                    {{-- <div class="time deal-timer product-deal-timer mx-md-0 mx-auto" id="clockdiv-1" data-hours="1"
                        data-minutes="2" data-seconds="3">
                        <div class="product-title">
                            <h4>Hurry up! Sales Ends In</h4>
                        </div>
                        <ul>
                            <li>
                                <div class="counter d-block">
                                    <div class="days d-block">
                                        <h5></h5>
                                    </div>
                                    <h6>Days</h6>
                                </div>
                            </li>
                            <li>
                                <div class="counter d-block">
                                    <div class="hours d-block">
                                        <h5></h5>
                                    </div>
                                    <h6>Hours</h6>
                                </div>
                            </li>
                            <li>
                                <div class="counter d-block">
                                    <div class="minutes d-block">
                                        <h5></h5>
                                    </div>
                                    <h6>Min</h6>
                                </div>
                            </li>
                            <li>
                                <div class="counter d-block">
                                    <div class="seconds d-block">
                                        <h5></h5>
                                    </div>
                                    <h6>Sec</h6>
                                </div>
                            </li>
                        </ul>
                    </div> --}}



                    @livewire('product-show-buttons',['product'=>$product])

                    <div class="buy-box">
                        <a href="wishlist.html">
                            <i data-feather="heart"></i>
                            <span>Add To Wishlist</span>
                        </a>

                        {{-- <a href="compare.html">
                            <i data-feather="shuffle"></i>
                            <span>Add To Compare</span>
                        </a> --}}
                    </div>

                    <div class="pickup-box">
                        <div class="product-title">
                            <h4>Description</h4>
                        </div>

                        <div class="pickup-detail">
                            <h4 class="text-content">
                                @php
                                echo $product->description
                                @endphp

                            </h4>
                        </div>

                        {{-- <div class="product-info">
                            <ul class="product-info-list">
                                <li>Type : <a href="javascript:void(0)">Black Forest</a></li>
                                <li>SKU : <a href="javascript:void(0)">SDFVW65467</a></li>
                                <li>MFG : <a href="javascript:void(0)">Jun 4, 2022</a></li>
                                <li>Stock : <a href="javascript:void(0)">2 Items Left</a></li>
                                <li>Tags : <a href="javascript:void(0)">Cake,</a> <a
                                        href="javascript:void(0)">Backery</a></li>
                            </ul>
                        </div> --}}
                    </div>

                    <div class="paymnet-option">
                        <div class="product-title">
                            <h4>Payment Option</h4>
                        </div>
                        <ul>
                            <li>
                                <a href="#">
                                    <img src="{{asset('/product/cod.png')}}" alt="Cash on delivery" height="40px" style="background: rgb(233, 227, 227); padding:6px; border-radius:7px;">
                                </a>
                            </li>
                            <li>
                                {{--<a href="javascript:void(0)">
                                    <img src="/frontassets/images/product/payment/1.svg" class="blur-up lazyload"
                                        alt="">
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="/frontassets/images/product/payment/2.svg" class="blur-up lazyload"
                                        alt="">
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="/frontassets/images/product/payment/3.svg" class="blur-up lazyload"
                                        alt="">
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="/frontassets/images/product/payment/4.svg" class="blur-up lazyload"
                                        alt="">
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="/frontassets/images/product/payment/5.svg" class="blur-up lazyload"
                                        alt="">
                                </a>
                            </li> --}}
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="product-section-box">
                    <ul class="nav nav-tabs custom-nav" id="myTab" role="tablist">
                        {{-- <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="description-tab" data-bs-toggle="tab"
                                data-bs-target="#description" type="button" role="tab" aria-controls="description"
                                aria-selected="true">Description</button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="info-tab" data-bs-toggle="tab" data-bs-target="#info"
                                type="button" role="tab" aria-controls="info" aria-selected="false">Additional
                                info</button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="care-tab" data-bs-toggle="tab" data-bs-target="#care"
                                type="button" role="tab" aria-controls="care" aria-selected="false">Care
                                Instuctions</button>
                        </li> --}}

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="review-tab" data-bs-toggle="tab" data-bs-target="#review"
                                type="button" role="tab" aria-controls="review"
                                aria-selected="true">Review</button>
                        </li>
                    </ul>

                    <div class="tab-content custom-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="description" role="tabpanel"
                            aria-labelledby="description-tab">
                            <div class="product-description">
                                {{-- <div class="nav-desh">
                                    <p>Jelly beans carrot cake icing biscuit oat cake gummi bears tart. Lemon drops
                                        carrot cake pudding sweet gummi bears. Chocolate cake tart cupcake donut
                                        topping liquorice sugar plum chocolate bar. Jelly beans tiramisu caramels
                                        jujubes biscuit liquorice chocolate. Pudding toffee jujubes oat cake sweet
                                        roll. Lemon drops dessert croissant roll halvah brownie topping. Marshmallow
                                        powder candy sesame snaps jelly beans candy canes marshmallow gingerbread
                                        pie.</p>
                                </div>

                                <div class="nav-desh">
                                    <div class="desh-title">
                                        <h5>Organic:</h5>
                                    </div>
                                    <p>vitae et leo duis ut diam quam nulla porttitor massa id neque aliquam
                                        vestibulum morbi blandit cursus risus at ultrices mi tempus imperdiet nulla
                                        malesuada pellentesque elit eget gravida cum sociis natoque penatibus et
                                        magnis dis parturient montes nascetur ridiculus mus mauris vitae ultricies
                                        leo integer malesuada nunc vel risus commodo viverra maecenas accumsan lacus
                                        vel facilisis volutpat est velit egestas dui id ornare arcu odio ut sem
                                        nulla pharetra diam sit amet nisl suscipit adipiscing bibendum est ultricies
                                        integer quis auctor elit sed vulputate mi sit amet mauris commodo quis
                                        imperdiet massa tincidunt nunc pulvinar sapien et ligula ullamcorper
                                        malesuada proin libero nunc consequat interdum varius sit amet mattis
                                        vulputate enim nulla aliquet porttitor lacus luctus accumsan.</p>
                                </div>

                                <div class="banner-contain nav-desh">
                                    <img src="/frontassets/images/vegetable/banner/14.jpg"
                                        class="bg-img blur-up lazyload" alt="">
                                    <div class="banner-details p-center banner-b-space w-100 text-center">
                                        <div>
                                            <h6 class="ls-expanded theme-color mb-sm-3 mb-1">SUMMER</h6>
                                            <h2>VEGETABLE</h2>
                                            <p class="mx-auto mt-1">Save up to 5% OFF</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="nav-desh">
                                    <div class="desh-title">
                                        <h5>From The Manufacturer:</h5>
                                    </div>
                                    <p>Jelly beans shortbread chupa chups carrot cake jelly-o halvah apple pie
                                        pudding gingerbread. Apple pie halvah cake tiramisu shortbread cotton candy
                                        croissant chocolate cake. Tart cupcake caramels gummi bears macaroon
                                        gingerbread fruitcake marzipan wafer. Marzipan dessert cupcake ice cream
                                        tootsie roll. Brownie chocolate cake pudding cake powder candy ice cream ice
                                        cream cake. Jujubes soufflé chupa chups cake candy halvah donut. Tart tart
                                        icing lemon drops fruitcake apple pie.</p>

                                    <p>Dessert liquorice tart soufflé chocolate bar apple pie pastry danish soufflé.
                                        Gummi bears halvah gingerbread jelly icing. Chocolate cake chocolate bar
                                        pudding chupa chups bear claw pie dragée donut halvah. Gummi bears cookie
                                        ice cream jelly-o jujubes sweet croissant. Marzipan cotton candy gummi bears
                                        lemon drops lollipop lollipop chocolate. Ice cream cookie dragée cake sweet
                                        roll sweet roll.Lemon drops cookie muffin carrot cake chocolate marzipan
                                        gingerbread topping chocolate bar. Soufflé tiramisu pastry sweet dessert.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="info" role="tabpanel" aria-labelledby="info-tab">
                            <div class="table-responsive">
                                <table class="table info-table">
                                    <tbody>
                                        <tr>
                                            <td>Specialty</td>
                                            <td>Vegetarian</td>
                                        </tr>
                                        <tr>
                                            <td>Ingredient Type</td>
                                            <td>Vegetarian</td>
                                        </tr>
                                        <tr>
                                            <td>Brand</td>
                                            <td>Lavian Exotique</td>
                                        </tr>
                                        <tr>
                                            <td>Form</td>
                                            <td>Bar Brownie</td>
                                        </tr>
                                        <tr>
                                            <td>Package Information</td>
                                            <td>Box</td>
                                        </tr>
                                        <tr>
                                            <td>Manufacturer</td>
                                            <td>Prayagh Nutri Product Pvt Ltd</td>
                                        </tr>
                                        <tr>
                                            <td>Item part number</td>
                                            <td>LE 014 - 20pcs Crème Bakes (Pack of 2)</td>
                                        </tr>
                                        <tr>
                                            <td>Net Quantity</td>
                                            <td>40.00 count</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="care" role="tabpanel" aria-labelledby="care-tab">
                            <div class="information-box">
                                <ul>
                                    <li>Store cream cakes in a refrigerator. Fondant cakes should be
                                        stored in an air conditioned environment.</li>

                                    <li>Slice and serve the cake at room temperature and make sure
                                        it is not exposed to heat.</li>

                                    <li>Use a serrated knife to cut a fondant cake.</li>

                                    <li>Sculptural elements and figurines may contain wire supports
                                        or toothpicks or wooden skewers for support.</li>

                                    <li>Please check the placement of these items before serving to
                                        small children.</li>

                                    <li>The cake should be consumed within 24 hours.</li>

                                    <li>Enjoy your cake!</li>
                                </ul>
                            </div>
                        </div> --}}

                        <div class="tab-pane" id="review" role="tabpanel" aria-labelledby="review-tab">
                            <div class="review-box">
                                <div class="row g-4">
                                    <div class="col-xl-6">
                                        <div class="review-title">
                                            <h4 class="fw-500">Customer reviews</h4>
                                        </div>

                                        <div class="d-flex">
                                            <div class="product-rating">
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
                                                        <i data-feather="star"></i>
                                                    </li>
                                                    <li>
                                                        <i data-feather="star"></i>
                                                    </li>
                                                </ul>
                                            </div>
                                            <h6 class="ms-3">4.2 Out Of 5</h6>
                                        </div>

                                        <div class="rating-box">
                                            <ul>
                                                <li>
                                                    <div class="rating-list">
                                                        <h5>5 Star</h5>
                                                        <div class="progress">
                                                            <div class="progress-bar" role="progressbar"
                                                                style="width: 68%" aria-valuenow="100"
                                                                aria-valuemin="0" aria-valuemax="100">
                                                                68%
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="rating-list">
                                                        <h5>4 Star</h5>
                                                        <div class="progress">
                                                            <div class="progress-bar" role="progressbar"
                                                                style="width: 67%" aria-valuenow="100"
                                                                aria-valuemin="0" aria-valuemax="100">
                                                                67%
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="rating-list">
                                                        <h5>3 Star</h5>
                                                        <div class="progress">
                                                            <div class="progress-bar" role="progressbar"
                                                                style="width: 42%" aria-valuenow="100"
                                                                aria-valuemin="0" aria-valuemax="100">
                                                                42%
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="rating-list">
                                                        <h5>2 Star</h5>
                                                        <div class="progress">
                                                            <div class="progress-bar" role="progressbar"
                                                                style="width: 30%" aria-valuenow="100"
                                                                aria-valuemin="0" aria-valuemax="100">
                                                                30%
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="rating-list">
                                                        <h5>1 Star</h5>
                                                        <div class="progress">
                                                            <div class="progress-bar" role="progressbar"
                                                                style="width: 24%" aria-valuenow="100"
                                                                aria-valuemin="0" aria-valuemax="100">
                                                                24%
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-xl-6">
                                        <div class="review-title">
                                            <h4 class="fw-500">Add a review</h4>
                                        </div>

                                        <div class="row g-4">
                                            <div class="col-md-6">
                                                <div class="form-floating theme-form-floating">
                                                    <input type="text" class="form-control" id="name"
                                                        placeholder="Name">
                                                    <label for="name">Your Name</label>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-floating theme-form-floating">
                                                    <input type="email" class="form-control" id="email"
                                                        placeholder="Email Address">
                                                    <label for="email">Email Address</label>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-floating theme-form-floating">
                                                    <input type="url" class="form-control" id="website"
                                                        placeholder="Website">
                                                    <label for="website">Website</label>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-floating theme-form-floating">
                                                    <input type="url" class="form-control" id="review1"
                                                        placeholder="Give your review a title">
                                                    <label for="review1">Review Title</label>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-floating theme-form-floating">
                                                    <textarea class="form-control"
                                                        placeholder="Leave a comment here" id="floatingTextarea2"
                                                        style="height: 150px"></textarea>
                                                    <label for="floatingTextarea2">Write Your
                                                        Comment</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="review-title">
                                            <h4 class="fw-500">Customer questions & answers</h4>
                                        </div>

                                        <div class="review-people">
                                            <ul class="review-list">
                                                <li>
                                                    <div class="people-box">
                                                        <div>
                                                            <div class="people-image">
                                                                <img src="/frontassets/images/review/1.jpg"
                                                                    class="img-fluid blur-up lazyload" alt="">
                                                            </div>
                                                        </div>

                                                        <div class="people-comment">
                                                            <a class="name" href="javascript:void(0)">Tracey</a>
                                                            <div class="date-time">
                                                                <h6 class="text-content">14 Jan, 2022 at 12.58 AM
                                                                </h6>

                                                                <div class="product-rating">
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
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>

                                                            <div class="reply">
                                                                <p>Icing cookie carrot cake chocolate cake sugar
                                                                    plum jelly-o danish. Dragée dragée shortbread
                                                                    tootsie roll croissant muffin cake I love gummi
                                                                    bears. Candy canes ice cream caramels tiramisu
                                                                    marshmallow cake shortbread candy canes
                                                                    cookie.<a href="javascript:void(0)">Reply</a>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="people-box">
                                                        <div>
                                                            <div class="people-image">
                                                                <img src="/frontassets/images/review/2.jpg"
                                                                    class="img-fluid blur-up lazyload" alt="">
                                                            </div>
                                                        </div>

                                                        <div class="people-comment">
                                                            <a class="name" href="javascript:void(0)">Olivia</a>
                                                            <div class="date-time">
                                                                <h6 class="text-content">01 May, 2022 at 08.31 AM
                                                                </h6>
                                                                <div class="product-rating">
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
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>

                                                            <div class="reply">
                                                                <p>Tootsie roll cake danish halvah powder cake.
                                                                    Tootsie roll candy marshmallow cookie brownie
                                                                    apple pie pudding brownie chocolate bar. Jujubes
                                                                    gummi bears I love powder danish oat cake tart
                                                                    croissant.<a href="javascript:void(0)">Reply</a>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="people-box">
                                                        <div>
                                                            <div class="people-image">
                                                                <img src="/frontassets/images/review/3.jpg"
                                                                    class="img-fluid blur-up lazyload" alt="">
                                                            </div>
                                                        </div>

                                                        <div class="people-comment">
                                                            <a class="name" href="javascript:void(0)">Gabrielle</a>
                                                            <div class="date-time">
                                                                <h6 class="text-content">21 May, 2022 at 05.52 PM
                                                                </h6>

                                                                <div class="product-rating">
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
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>

                                                            <div class="reply">
                                                                <p>Biscuit chupa chups gummies powder I love sweet
                                                                    pudding jelly beans. Lemon drops marzipan apple
                                                                    pie gingerbread macaroon croissant cotton candy
                                                                    pastry wafer. Carrot cake halvah I love tart
                                                                    caramels pudding icing chocolate gummi bears.
                                                                    Gummi bears danish cotton candy muffin marzipan
                                                                    caramels awesome feel. <a
                                                                        href="javascript:void(0)">Reply</a>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Left Sidebar End -->

<!-- Releted Product Section Start -->
<section class="product-list-section section-b-space">
    <div class="container-fluid-lg">
        <div class="title">
            <h2>Related Products</h2>
            <span class="title-leaf">
                <svg class="icon-width">
                    <use xlink:href="/frontassets/svg/leaf.svg#leaf"></use>
                </svg>
            </span>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="slider-6_1 product-wrapper">
                    
                    @foreach($similarProduct as $product)
                    <div>
                        <div class="product-box-3 wow fadeInUp" data-wow-delay="0.05s">
                            <div class="product-header">
                                <div class="product-image">
                                    <a href="product-left-thumbnail.html">
                                        <img src={{$product->getMedia('images')->first()?->getFullUrl()}}
                                            class="img-fluid blur-up lazyload" alt="">
                                    </a>

                                    {{-- <ul class="product-option">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#view">
                                                <i data-feather="eye"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                            <a href="compare.html">
                                                <i data-feather="refresh-cw"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                            <a href="wishlist.html" class="notifi-wishlist">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul> --}}
                                </div>
                            </div>
                            <div class="product-footer">
                                <div class="product-detail">
                                    <span class="span-name">{{ucwords($product->category->first()->name)}}</span>
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
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</section>
    
@endsection