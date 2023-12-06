<div class="note-box product-packege">
    <div class="cart_qty qty-box product-qty">
        <div class="input-group">
            <button type="button" class="qty-right-plus" data-type="plus" data-field="">
                <i class="fa fa-plus" aria-hidden="true"></i>
            </button>
            <input class="form-control input-number qty-input" type="text" name="quantity"
                value="0">
            <button type="button" class="qty-left-minus" data-type="minus" data-field="">
                <i class="fa fa-minus" aria-hidden="true"></i>
            </button>
        </div>
    </div>

    <button  wire:click='addToCart({{$p_id}})'
        class="btn btn-md bg-dark cart-button text-white w-100">Add To Cart</button>

    <button onclick="location.href = 'cart.html';"
        class="btn btn-md bg-primary cart-button text-white w-100">Buy Now</button>
</div>
