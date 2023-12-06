<div>
    <div class="product-packege">
                        
        <ul class="select-packege">
            @foreach($product->variants  as $variant)
            <li>
                
                {{-- class='active' for button clicked--}} 
                <button wire:click="updateVariant({{$variant->id}})" class="form-control" 
                    style="padding: 0;" data-variant-id='{{$variant->id}}' onclick="buttonPressed(this)">
                    <a  class="{{ $activeVariant == $variant->id ? 'active' : '' }}"  id='variant{{$variant->id}}'> 
                        <b>{{$variant->name}}</b>
                        , RS @if($product->discount_p) <del>{{$variant->price}}</del> {{'RS '. ($variant->price - $variant->price*$product->discount_p/100)}} @else  {{'RS '.$variant->price}}@endif
                    </a>
                </button>
                
            </li>
            @endforeach
            
        </ul>
    </div>
        <div class="note-box product-packege">
            <div class="cart_qty qty-box product-qty">
                <div class="input-group">
                    <button wire:click='increment' type="button" class="qty-right-plus" data-type="plus" data-field="">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                    </button>
                    <input  class="form-control input-number qty-input" type="text" name="quantity"
                        value="{{$count}}">
                        
                    @if($count > 1)
                    <button  wire:click='decrement' type="button" class="qty-left-minus" data-type="minus" data-field="" >
                        <i class="fa fa-minus" aria-hidden="true"></i>
                    </button>
                    @endif
                </div>
            </div>
        
            <button  wire:click='addToCart({{$product->id}})'
                class="btn btn-md bg-dark cart-button text-white w-100">Add To Cart</button>
        
            <button wire:click='buyNow({{$product->id}})'
                class="btn btn-md bg-primary cart-button text-white w-100">Buy Now</button>
        </div>
    </div>

    
    
