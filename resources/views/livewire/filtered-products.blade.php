<div wire:key="products">
    @foreach ($products as $product)

    <div wire:key="product-{{$product->id}}">
        <div class="product-box-3 h-100 wow fadeInUp">
            <div class="product-header">
                <div class="product-image">
                    <a href="{{route('front.product', 'test')}}">
                        <img src="{{$product->getMedia('images')->first()?->getFullUrl()}}" class="img-fluid blur-up lazyload" alt="">
                    </a>
                </div>
            </div>
            <div class="product-footer">
                <div class="product-detail">
                    <span class="span-name">{{$product->category()->pluck('name')->implode(', ')}}</span>
                    <a href="product-left-thumbnail.html">
                        <h5 class="name">{{$product->name}}</h5>
                    </a>
                    <p class="text-content mt-1 mb-2 product-content">{{$product->category()->pluck('name')->implode(', ')}}</p>
                    <p class="text-content mt-1 mb-2 product-content">{{strip_tags($product->description)}}</p>
                    <div class="product-rating mt-2">
                        <ul class="rating">
                            @for ($i = 0; $i < 5; $i++) <li>
                                <i data-feather="star" class="{{$product->average_rating > $i ? 'fill' : ''}}"></i>
                                </li>
                                @endfor
                        </ul>
                        <span>({{$product->average_rating}})</span>
                    </div>
                    <h6 class="unit">250 ml</h6>
                    <h5 class="price"><span class="theme-color">$08.02</span> <del>$15.15</del>
                    </h5>
                    <div class="add-to-cart-box bg-white">
                        <button class="btn btn-add-cart addcart-button">Add
                            <span class="add-icon bg-light-gray">
                                <i class="fa-solid fa-plus"></i>
                            </span>
                        </button>
                        <div class="cart_qty qty-box">
                            <div class="input-group bg-white">
                                <button type="button" class="qty-left-minus bg-gray" data-type="minus" data-field="">
                                    <i class="fa fa-minus" aria-hidden="true"></i>
                                </button>
                                <input class="form-control input-number qty-input" type="text" name="quantity" value="0">
                                <button type="button" class="qty-right-plus bg-gray" data-type="plus" data-field="">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>