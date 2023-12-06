<div class="product-box">
    <div class="product-image">
        <a href="{{route('front.product',$product->slug)}}">
            <img src="{{$product->getMedia('images')->first()->getFullUrl()}}"
                class="img-fluid blur-up lazyload" alt="{{$product->name}}">
        </a>
        
    </div>
    <div class="product-detail">
        <a href="{{route('front.product',$product->slug)}}">
            <h6 class="name">{{ucwords($product->name)}}</h6>
        </a>

        <h5 class="sold text-content">
            <span class="theme-color price">RS . {{$product->variants[0]->price}}</span>
            
        </h5>

        <div class="product-rating mt-sm-2 mt-1">
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

           
        </div>

        <div class="add-to-cart-box">
            
            
            <div class="cart_qty qty-box">
                <div class="input-group">
                    <button type="button" class="qty-left-minus"
                        data-type="minus" data-field="">
                        <i class="fa fa-minus" aria-hidden="true"></i>
                    </button>
                    <input class="form-control input-number qty-input"
                        type="text" name="quantity" value="0">
                    <button type="button" class="qty-right-plus"
                        data-type="plus" data-field="">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>