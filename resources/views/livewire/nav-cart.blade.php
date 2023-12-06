<li class="right-side">
    <div class="onhover-dropdown header-badge">
        <button type="button" class="btn p-0 position-relative header-wishlist">
            <a href="{{route('cart.index')}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-shopping-cart">
                <circle cx="9" cy="21" r="1"></circle>
                <circle cx="20" cy="21" r="1"></circle>
                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
            </svg>
        </a>
            <span class="position-absolute top-0 start-100 translate-middle badge">{{$cartItemCount}}
                <span class="visually-hidden">unread messages</span>
            </span>
        </button>

        <div class="onhover-div">
            <ul class="cart-list">
                
                @if(count($items) !== 0)
                
                    @foreach($items as $item)
                        <li class="product-box-contain">
                            <div class="drop-cart">
                                <a href="product-left-thumbnail.html" class="drop-image">
                                    <img src="{{App\Models\Product::findOrFail($item['id'])->getMedia('images')->first()->getFullUrl()}}"
                                        class="blur-up lazyload" alt="">
                                </a>
            
                                <div class="drop-contain">
                                    <a href="{{route('front.product',Str::slug($item['name']))}}">
                                        <h5>{{ $item['name'] }}</h5>
                                    </a>
            
                                    <h6><span>{{ $item['qty'] }}</span> {{ $item['price'] }}</h6>
                                    <button wire:click="removeCartItem('{{ $item['rowId'] }}')" class="close-button">
                                        <i class="fa-solid fa-xmark"></i>
                                    </button>
                                   
                                </div>
                                
                            </div>
                       
                        
                    @endforeach
                @else
                    <li>
                        No items in the cart.
                    </li>
                @endif
            </ul>
            

            <div class="price-box">
                <h5>Total :</h5>
                <h4 class="theme-color fw-bold">{{Cart::total()}}</h4>
            </div>

            <div class="button-group">
                <a href="{{route('cart.index')}}" class="btn btn-sm cart-button">View Cart</a>
                <a href="{{route('checkout')}}" class="btn btn-sm cart-button theme-bg-color
                text-white">Checkout</a>
            </div>
        </div>
    </div>
</li>
