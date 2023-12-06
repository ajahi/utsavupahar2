<div class="table-responsive-xl">
    @if($items->count()!==0)
    <table class="table">
        <tbody>
          
            @foreach($items as $item)
            
            <tr class="product-box-contain">
                <td class="product-detail">
                    <div class="product border-0">
                        <a href="product-left-thumbnail.html" class="product-image">
                            
                            <img src="#"
                                class="img-fluid blur-up lazyload" alt="">
                        </a>
                        <div class="product-detail">
                            <ul>
                                <li class="name">
                                    <a href="product-left-thumbnail.html">{{$item->name}}</a>
                                </li>

                                <li class="text-content"><span class="text-title">Sold
                                        By:</span> Fresho</li>

                                <li class="text-content"><span
                                        class="text-title">Quantity</span> - 500 g</li>

                                <li>
                                    <h5 class="text-content d-inline-block">Price :</h5>
                                    <span>$35.10</span>
                                    <span class="text-content">$45.68</span>
                                </li>
                                
                                <li>
                                    <h5 class="saving theme-color">Saving : $20.68</h5>
                                </li>

                                <li class="quantity-price-box">
                                    <div class="cart_qty">
                                        <div class="input-group">
                                            <button type="button" class="btn qty-left-minus"
                                                data-type="minus" data-field="">
                                                <i class="fa fa-minus ms-0"
                                                    aria-hidden="true"></i>
                                            </button>
                                            <input class="form-control input-number qty-input"
                                                type="text" name="quantity" value="0">
                                            <button type="button" class="btn qty-right-plus"
                                                data-type="plus" data-field="">
                                                <i class="fa fa-plus ms-0"
                                                    aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <h5>Total: Rs. {{Cart::subtotal()}}</h5>
                                </li>
                            </ul>
                        </div>
                    </div>
                </td>

                <td class="price">
                    <h4 class="table-title text-content">Price</h4>
                    <h5>$35.10 <del class="text-content">$45.68</del></h5>
                    <h6 class="theme-color">You Save : $20.68</h6>
                </td>

                <td class="quantity">
                    <h4 class="table-title text-content">Qty</h4>
                    <div class="quantity-price">
                        <div class="cart_qty">
                            <div class="input-group">
                                <button type="button" class="btn qty-left-minus"
                                    data-type="minus" data-field="">
                                    <i class="fa fa-minus ms-0" aria-hidden="true"></i>
                                </button>
                                <input class="form-control input-number qty-input" type="text"
                                    name="quantity" value="0">
                                <button type="button" class="btn qty-right-plus"
                                    data-type="plus" data-field="">
                                    <i class="fa fa-plus ms-0" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </td>

                <td class="subtotal">
                    <h4 class="table-title text-content">Total</h4>
                    <h5>$35.10</h5>
                </td>

                <td class="save-remove">
                    <h4 class="table-title text-content">Action</h4>
                    <a class="save notifi-wishlist" href="javascript:void(0)">Save for later</a>
                    <a class="remove close_button" href="{{route('removeCartItem',$item->rowId)}}">Remove</a>
                </td>
            </tr>
            @endforeach
            
            

        </tbody>
    </table>
    @elseif($items->count()==0)
        
    <tbody class="table">
        <tr class="product-box-contain">
            <td class="product-detail">
                <p> No-items in the cart</p>
               
            </td>
        </tr>

    </tbody>
    
    @endif
    
   
    
</div>
