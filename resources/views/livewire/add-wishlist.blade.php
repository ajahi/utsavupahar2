<div>
    <div class="onhover-dropdown header-badge">
        <a wire:click.prevent="addItemToWishlist" href="#" class="btn p-0 position-relative header-wishlist">

            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart">
                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
            </svg>
            @if($product_id)
            <span>Add To Wishlist</span>
            @else
            <span class="position-absolute top-0 start-100 translate-middle badge">{{ $wishlistItemCount }}
                <span class="visually-hidden">unread messages</span>
            </span>
            @endif
        </a>
        @if(!$product_id)
        <div class="onhover-div">
            <ul class="cart-list">
                @if (count($items))
                @foreach ($items as $item)
                <li class="product-box-contain">
                    <div class="drop-cart">
                        <a href="#" class="drop-image">
                            <img src="{{ App\Models\Product::findOrFail($item['id'])->getMedia('images')->first()->getFullUrl() }}" class="blur-up lazyload" alt="">
                        </a>

                        <div class="drop-contain">
                            <a href="#">
                                <h5>{{ $item['name'] }}</h5>
                            </a>

                            <h6><span>{{ "Qty ".$item['qty'] . ' *'}}</span> {{"RS ". $item['price'] }}</h6>
                            <button wire:click="removeCartItem('{{ $item['rowId'] }}')" class="close-button close_button">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>
                    </div>
                </li>
                @endforeach
                @else
                <li>
                    No items in wishlist.
                </li>
                @endif
            </ul>


            {{--<div class="price-box">
                <h5>Total :</h5>
                <h4 class="theme-color fw-bold">{{ Cart::subTotal() }}</h4>
        </div>

        <div class="button-group">
            <a href="{{ route('cart.index') }}" class="btn btn-sm cart-button">View Cart</a>
            <a href="{{route('checkout')}}" class="btn btn-sm cart-button theme-bg-color
                text-white">Checkout</a>
        </div>--}}
    </div>
    @endif
</div>
</div>