<div class="table-responsive-xl">
    
    <table class="table" >
        <tbody wire.poll.3s='getData'>
          
            @foreach($items as $item)
            
            <tr class="product-box-contain">
                <td class="product-detail">
                    <div class="product border-0">
                        <a href="{{route('front.product',App\Models\Product::findOrFail($item['id'])->slug)}}" class="product-image">
                            
                            <img src="{{App\Models\Product::findOrFail($item['id'])->getMedia('images')->first()->getFullUrl()}}"
                                class="img-fluid blur-up lazyload" alt="">
                        </a>
                        <div class="product-detail">
                            <ul>
                                <li class="name">
                                    <a href="{{route('front.product',App\Models\Product::findOrFail($item['id'])->slug)}}">{{$item['name']}}</a>
                                </li>

                                {{-- <li class="text-content"><span class="text-title">Sold
                                        By:</span> Fresho</li> --}}

                                <li class="text-content"><span
                                        class="text-title">Discount</span> - {{App\Models\Product::findOrFail($item['id'])->discount_p}} %</li>

                                <li>
                                    <h5 class="text-content d-inline-block">Price :</h5>
                                    <span>RS. {{$item['price']}}</span>
                                    
                                </li>
                                
                                

                                <li class="quantity-price-box">
                                    <div class="cart_qty">
                                        <div class="input-group">
                                            <form action="{{route('reduceItemByOne')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="rowid" value={{$item['rowId']}}>
                                                <button type="submit" class="btn qty-left-minus">
                                                <i class="fa fa-minus ms-0"
                                                    aria-hidden="true"></i>
                                            </button>
                                            </form>
                                            
                                            <input class="form-control input-number qty-input"
                                                type="text" name="quantity" value="0">
                                            
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <h5>Total: Rs.  </h5>
                                </li>
                            </ul>
                        </div>
                    </div>
                </td>

                <td class="price">
                    <h4 class="table-title text-content">Price</h4>
                    <h5> RS. {{$item['price']}} <del class="text-content">RS . {{$item['options']['variant_price']}}</del></h5>
                    <h6 class="theme-color">You Save : RS . {{$item['options']['variant_price']-$item['price']}}</h6>
                </td>

                <td class="quantity">
                    <h4 class="table-title text-content">Qty </h4>
                    <div class="quantity-price">
                        <div class="cart_qty">
                            <div class="input-group">
                                <button type="button" class="btn qty-left-minus"
                                    data-type="minus" data-field="">
                                    <i class="fa fa-minus ms-0" aria-hidden="true"></i>
                                </button>
                                <input class="form-control input-number qty-input" type="text"
                                    name="quantity" value="{{$item['qty']}}">
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
                    <h5>RS.{{$item['price']*$item['qty']}}</h5>
                </td>

                <td class="save-remove">
                    <h4 class="table-title text-content">Action</h4>
                    <a class="save notifi-wishlist" href="javascript:void(0)">Save for later</a>
                    <button class="form-control" wire:click="removeCartItem('{{ $item['rowId'] }}')" class="close-button close_button">
                        Remove
                    </button>
                    
                </td>
            </tr>
            @endforeach
            
            

        </tbody>
    </table>
    
    
   
    
</div>

