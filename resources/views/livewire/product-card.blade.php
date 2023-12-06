<div class="product-box">
    <div class="product-image">
        <a href="{{route('front.product',$product->slug)}}">
            @if($product->getMedia('images'))
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
