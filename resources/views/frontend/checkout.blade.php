@extends('layouts.frontend')

@section('page-content')
<section class="breadscrumb-section pt-0">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-12">
                <div class="breadscrumb-contain">
                    <h2>Checkout</h2>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="{{route('home')}}">
                                    <i class="fa-solid fa-house"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Checkout section Start -->
<section class="checkout-section-2 section-b-space">
    <div class="container-fluid-lg">
        <form action="{{route('store.checkout')}}" method="post">
            @csrf
            
            <div class="row g-sm-4 g-3">
            
                <div class="col-lg-8">
                    <div class="left-sidebar-checkout">
                        <div class="checkout-detail-box">
                            <ul>
                                <li>
                                    <div class="checkout-icon">
                                        <lord-icon target=".nav-item" src="https://cdn.lordicon.com/ggihhudh.json"
                                            trigger="loop-on-hover"
                                            colors="primary:#121331,secondary:#646e78,tertiary:#0baf9a"
                                            class="lord-icon">
                                        </lord-icon>
                                    </div>
                                    <div class="checkout-box">
                                        <div class="checkout-title">
                                            <h4>Shipping Address <i data-bs-toggle="tooltip" data-bs-placement="top" title="Enter your complete address, where shippment is to be made.Include regional state, district, city, and street name.">&#9432</i></h4>
                                            <br>
                                                <small>(Regional state,District,city,streetname)</small>
                                                
                                            </h4>
                                        </div>
    
                                        <div class="checkout-detail">
                                            <div class="row g-4">
                                                
                                                <input type="text" class="form-control" name="shipping_address"placeholder="Gandaki,Kaski,Pokhara,sangam marga">
                                                <x-input-error :messages="$errors->get('shipping_address')" class="mt-2 alert alert-danger" />

                                                {{-- <div class="col-xxl-6 col-lg-12 col-md-6">
                                                    <div class="delivery-address-box">
                                                        <div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="jack"
                                                                    id="flexRadioDefault1">
                                                            </div>
    
                                                            <div class="label">
                                                                <a href="" style="color:white">Edit</a>
                                                            </div>
    
                                                            <ul class="delivery-address-detail">
                                                                <li>
                                                                    <h4 class="fw-500">Jack Jennas (HOME)</h4>
                                                                </li>
    
                                                                <li>
                                                                    <p class="text-content"><span
                                                                            class="text-title">Address
                                                                            : </span>8424 James Lane South San
                                                                        Francisco, CA 94080</p>
                                                                </li>
    
                                                                <li>
                                                                    <h6 class="text-content"><span
                                                                            class="text-title">Pin Code
                                                                            :</span> +380</h6>
                                                                </li>
    
                                                                <li>
                                                                    <h6 class="text-content mb-0"><span
                                                                            class="text-title">Phone
                                                                            :</span> + 380 (0564) 53 - 29 - 68</h6>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
    
                                                <div class="col-xxl-6 col-lg-12 col-md-6">
                                                    <div class="delivery-address-box">
                                                        <div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="jack"
                                                                    id="flexRadioDefault2" checked="checked">
                                                            </div>
    
                                                            <div class="label">
                                                                
                                                            </div>
    
                                                            <ul class="delivery-address-detail">
                                                                <li>
                                                                    <h4 class="fw-500">Jack Jennas (OFFICE)</h4>
                                                                </li>
    
                                                                <li>
                                                                    <p class="text-content"><span
                                                                            class="text-title">Address
                                                                            :</span>Nakhimovskiy R-N / Lastovaya Ul.,
                                                                        bld. 5/A, appt. 12
                                                                    </p>
                                                                </li>
    
                                                                <li>
                                                                    <h6 class="text-content"><span
                                                                            class="text-title">Pin Code :</span>
                                                                        +380</h6>
                                                                </li>
    
                                                                <li>
                                                                    <h6 class="text-content mb-0"><span
                                                                            class="text-title">Phone
                                                                            :</span> + 380 (0564) 53 - 29 - 68</h6>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                                
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkout-icon">
                                        <lord-icon target=".nav-item" src="https://cdn.lordicon.com/ggihhudh.json"
                                            trigger="loop-on-hover"
                                            colors="primary:#121331,secondary:#646e78,tertiary:#0baf9a"
                                            class="lord-icon">
                                        </lord-icon>
                                    </div>
                                    <div class="checkout-box">
                                        <div class="checkout-title">
                                            <h4>Billing Address <i data-bs-toggle="tooltip" data-bs-placement="top" title="Enter your complete billing address, including regional state, district, city, and street name.">&#9432</i></h4>
                                            
                                            <br>
                                            <small>(Regional state,District,city,streetname)</small>
                                                
                                            </h4>
                                        </div>
    
                                        <div class="checkout-detail">
                                            <div class="row g-4">
                                                
                                                <input type="text" class="form-control" name="billing_address" placeholder="Gandaki,Kaski,Pokhara,sangam marga"> 
                                                <x-input-error :messages="$errors->get('billing_address')" class="mt-2 alert alert-danger" />
                                                
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                
                                <li>
                                    <div class="checkout-icon">
                                        <lord-icon target=".nav-item" src="https://cdn.lordicon.com/qmcsqnle.json"
                                            trigger="loop-on-hover" colors="primary:#0baf9a,secondary:#0baf9a"
                                            class="lord-icon">
                                        </lord-icon>
                                    </div>
                                    <div class="checkout-box">
                                        <div class="checkout-title">
                                            <h4>Delivery Option</h4>
                                        </div>
    
                                        <div class="checkout-detail">
                                            <div class="accordion accordion-flush custom-accordion"
                                                id="accordionFlushExample">
                                                <div class="accordion-item">
                                                    <div class="accordion-header" id="flush-headingFour">
                                                        <div class="accordion-button collapsed"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#flush-collapseFour">
                                                            <div class="custom-form-check form-check mb-0">
                                                                <label class="form-check-label" for="cash"><input
                                                                        class="form-check-input mt-0" type="radio"
                                                                         id="cash" checked> Standard Delivery</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="flush-collapseFour"
                                                        class="accordion-collapse collapse show"
                                                        data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body">
                                                            <p class="cod-review">Delivery will be made with in 3 business days.
                                                                 <a href="javascript:void(0)">Know more.</a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
    
                                                <div class="accordion-item">
                                                    <div class="accordion-header" id="flush-headingOne">
                                                        <div class="accordion-button collapsed"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#flush-collapseOne">
                                                            <div class="custom-form-check form-check mb-0">
                                                                <label class="form-check-label" for="credit"><input
                                                                        class="form-check-input mt-0" type="radio"
                                                                         id="credit">
                                                                    Future Delivery</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="flush-collapseOne" class="accordion-collapse collapse"
                                                        data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body">
                                                            <div class="row g-2">
                                                                <div class="col-12">
                                                                    <div class="payment-method">
                                                                        <div
                                                                            class="form-floating mb-lg-3 mb-2 theme-form-floating">
                                                                            <input type="date" class="form-control" name="preferred_delivery_date"
                                                                                id="credit2"
                                                                                placeholder="Enter your future date for dleivery.">
                                                                            <label for="credit2">Enter your prefered date.</label>
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
                                </li>
                                
    
                                <li>
                                    <div class="checkout-icon">
                                        <lord-icon target=".nav-item" src="https://cdn.lordicon.com/qmcsqnle.json"
                                            trigger="loop-on-hover" colors="primary:#0baf9a,secondary:#0baf9a"
                                            class="lord-icon">
                                        </lord-icon>
                                    </div>
                                    <div class="checkout-box">
                                        <div class="checkout-title">
                                            <h4>Payment Option</h4>
                                        </div>
    
                                        <div class="checkout-detail">
                                            <div class="accordion accordion-flush custom-accordion"
                                                id="accordionFlushExample">
                                                <div class="accordion-item">
                                                    <div class="accordion-header" id="flush-headingFour">
                                                        <div class="accordion-button collapsed"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#flush-collapseFour">
                                                            <div class="custom-form-check form-check mb-0">
                                                                <label class="form-check-label" for="cash"><input
                                                                        class="form-check-input mt-0" type="radio"
                                                                        name="payment_method" id="cash" checked value="cod"> Cash
                                                                    On Delivery</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="flush-collapseFour"
                                                        class="accordion-collapse collapse show"
                                                        data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body">
                                                            <p class="cod-review">Pay hand to hand cash for your gifts.
                                                                Happy gifting.
                                                                 
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
    
                                                <div class="accordion-item">
                                                    <div class="accordion-header" id="flush-headingOne">
                                                        <div class="accordion-button collapsed"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#flush-collapseOne">
                                                            <div class="custom-form-check form-check mb-0">
                                                                <label class="form-check-label" for="credit"><input
                                                                        class="form-check-input mt-0" type="radio"
                                                                        name="payment_method" value='card' id="credit">
                                                                    Credit or Debit Card</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="flush-collapseOne" class="accordion-collapse collapse"
                                                        data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body">
                                                            <div class="row g-2">
                                                                <div class="col-12">
                                                                    <div class="payment-method">
                                                                        <div
                                                                            class="form-floating mb-lg-3 mb-2 theme-form-floating">
                                                                            <input type="text" class="form-control"
                                                                                id="credit2"
                                                                                placeholder="Enter Credit & Debit Card Number">
                                                                            <label for="credit2">Enter Credit & Debit
                                                                                Card Number</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
    
                                                                <div class="col-xxl-4">
                                                                    <div
                                                                        class="form-floating mb-lg-3 mb-2 theme-form-floating">
                                                                        <input type="text" class="form-control"
                                                                            id="expiry" placeholder="Enter Expiry Date">
                                                                        <label for="expiry">Expiry Date</label>
                                                                    </div>
                                                                </div>
    
                                                                <div class="col-xxl-4">
                                                                    <div
                                                                        class="form-floating mb-lg-3 mb-2 theme-form-floating">
                                                                        <input type="text" class="form-control" id="cvv"
                                                                            placeholder="Enter CVV Number">
                                                                        <label for="cvv">CVV Number</label>
                                                                    </div>
                                                                </div>
    
                                                                <div class="col-xxl-4">
                                                                    <div
                                                                        class="form-floating mb-lg-3 mb-2 theme-form-floating">
                                                                        <input type="password" class="form-control"
                                                                            id="password" placeholder="Enter Password">
                                                                        <label for="password">Password</label>
                                                                    </div>
                                                                </div>
    
                                                                <div class="button-group mt-0">
                                                                    <ul>
                                                                        <li>
                                                                            <button
                                                                                class="btn btn-light shopping-button">Cancel</button>
                                                                        </li>
    
                                                                        <li>
                                                                            <button class="btn btn-animation">Use This
                                                                                Card</button>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
    
                                                {{-- <div class="accordion-item">
                                                    <div class="accordion-header" id="flush-headingTwo">
                                                        <div class="accordion-button collapsed"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#flush-collapseTwo">
                                                            <div class="custom-form-check form-check mb-0">
                                                                <label class="form-check-label" for="banking"><input
                                                                        class="form-check-input mt-0" type="radio"
                                                                        name="flexRadioDefault" id="banking">Net
                                                                    Banking</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                                        data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body">
                                                            <h5 class="text-uppercase mb-4">Select Your Bank
                                                            </h5>
                                                            <div class="row g-2">
                                                                <div class="col-md-6">
                                                                    <div class="custom-form-check form-check">
                                                                        <input class="form-check-input mt-0"
                                                                            type="radio" name="flexRadioDefault"
                                                                            id="bank1">
                                                                        <label class="form-check-label"
                                                                            for="bank1">Industrial & Commercial
                                                                            Bank</label>
                                                                    </div>
                                                                </div>
    
                                                                <div class="col-md-6">
                                                                    <div class="custom-form-check form-check">
                                                                        <input class="form-check-input mt-0"
                                                                            type="radio" name="flexRadioDefault"
                                                                            id="bank2">
                                                                        <label class="form-check-label"
                                                                            for="bank2">Agricultural Bank</label>
                                                                    </div>
                                                                </div>
    
                                                                <div class="col-md-6">
                                                                    <div class="custom-form-check form-check">
                                                                        <input class="form-check-input mt-0"
                                                                            type="radio" name="flexRadioDefault"
                                                                            id="bank3">
                                                                        <label class="form-check-label" for="bank3">Bank
                                                                            of America</label>
                                                                    </div>
                                                                </div>
    
                                                                <div class="col-md-6">
                                                                    <div class="custom-form-check form-check">
                                                                        <input class="form-check-input mt-0"
                                                                            type="radio" name="flexRadioDefault"
                                                                            id="bank4">
                                                                        <label class="form-check-label"
                                                                            for="bank4">Construction Bank Corp.</label>
                                                                    </div>
                                                                </div>
    
                                                                <div class="col-md-6">
                                                                    <div class="custom-form-check form-check">
                                                                        <input class="form-check-input mt-0"
                                                                            type="radio" name="flexRadioDefault"
                                                                            id="bank5">
                                                                        <label class="form-check-label" for="bank5">HSBC
                                                                            Holdings</label>
                                                                    </div>
                                                                </div>
    
                                                                <div class="col-md-6">
                                                                    <div class="custom-form-check form-check">
                                                                        <input class="form-check-input mt-0"
                                                                            type="radio" name="flexRadioDefault"
                                                                            id="bank6">
                                                                        <label class="form-check-label"
                                                                            for="bank6">JPMorgan Chase & Co.</label>
                                                                    </div>
                                                                </div>
    
                                                                <div class="col-12">
                                                                    <div class="select-option">
                                                                        <div class="form-floating theme-form-floating">
                                                                            <select
                                                                                class="form-select theme-form-select"
                                                                                aria-label="Default select example">
                                                                                <option value="hsbc">HSBC Holdings
                                                                                </option>
                                                                                <option value="loyds">Lloyds Banking
                                                                                    Group</option>
                                                                                <option value="natwest">Nat West Group
                                                                                </option>
                                                                                <option value="Barclays">Barclays
                                                                                </option>
                                                                                <option value="other">Others Bank
                                                                                </option>
                                                                            </select>
                                                                            <label>Select Other Bank</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
    
                                                <div class="accordion-item">
                                                    <div class="accordion-header" id="flush-headingThree">
                                                        <div class="accordion-button collapsed"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#flush-collapseThree">
                                                            <div class="custom-form-check form-check mb-0">
                                                                <label class="form-check-label" for="wallet"><input
                                                                        class="form-check-input mt-0" type="radio"
                                                                        name="flexRadioDefault" id="wallet">My
                                                                    Wallet</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="flush-collapseThree" class="accordion-collapse collapse"
                                                        data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body">
                                                            <h5 class="text-uppercase mb-4">Select Your Wallet
                                                            </h5>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="custom-form-check form-check">
                                                                        <label class="form-check-label"
                                                                            for="amazon"><input
                                                                                class="form-check-input mt-0"
                                                                                type="radio" name="flexRadioDefault"
                                                                                id="amazon">Amazon Pay</label>
                                                                    </div>
                                                                </div>
    
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </li>
    
                                <li>
                                    <div class="checkout-icon">
                                        <lord-icon target=".nav-item" src="https://cdn.lordicon.com/qmcsqnle.json"
                                            trigger="loop-on-hover" colors="primary:#0baf9a,secondary:#0baf9a"
                                            class="lord-icon">
                                        </lord-icon>
                                    </div>
                                    <div class="checkout-box">
                                        <div class="checkout-title">
                                            <h4>Optional</h4>
                                        </div>
    
                                        <div class="checkout-detail">
                                            <div class="accordion accordion-flush custom-accordion"
                                                id="accordionFlushExample">
                                                <div class="accordion-item">
                                                    <div class="accordion-header" id="flush-headingFour">
                                                        <div class="accordion-button collapsed"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#flush-collapseFour">
                                                            <div class="custom-form-check form-check mb-0">
                                                                <label class="form-check-label" for="cash"><input
                                                                        class="form-check-input mt-0" type="radio"
                                                                         id="cash" checked> Message to be printed.</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="flush-collapseFour"
                                                        class="accordion-collapse collapse show"
                                                        data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body">
                                                            <textarea name="special_message" class="form-control" id="" cols="50" rows="6" placeholder="Happy birthday "></textarea>
                                                        </div>
                                                    </div>
                                                </div>
    
                                                
    
                                                
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
    
                <div class="col-lg-4">
                    <div class="right-side-summery-box">
                        <div class="summery-box-2">
                            <div class="summery-header">
                                <h3>Order Summery</h3>
                            </div>
                            <a href="#">Edit</a>
                            
    
                            <ul class="summery-contain">
    
                                @foreach($cart_items as $item)
                                
                                <li>
                                    <img src="{{App\Models\Product::findOrFail($item->id)->getMedia('images')->first()->getFullUrl()}}"
                                        class="img-fluid blur-up lazyloaded checkout-image" alt="{{$item->name}}">
                                    <h4>{{$item->name}} <span>X {{$item->qty}}</span></h4>
                                    <h4 class="price">{{$item->price}}</h4>
                                </li>
                                @endforeach
                            </ul>
    
                            <ul class="summery-total">
                                <li>
                                    <h4>Subtotal</h4>
                                    <h4 class="price">RS.{{Cart::subTotal()}}</h4>
                                </li>
    
                                <li>
                                    <h4>Shipping</h4>
                                    <h4 class="price">RS.100</h4>
                                </li>
    
                                {{-- <li>
                                    <h4>Tax</h4>
                                    <h4 class="price">{{Cart::tax()}}</h4>
                                </li> --}}
    
                                <li class="list-total">
                                    <h4>Total (NRP)</h4>
                                    <h4 class="price">RS. {{Number::format($totalCost)}}</h4>
                                </li>
                            </ul>
                        </div>
    
                        {{-- <div class="checkout-offer">
                            <div class="offer-title">
                                <div class="offer-icon">
                                    <img src="../assets/images/inner-page/offer.svg" class="img-fluid" alt="">
                                </div>
                                <div class="offer-name">
                                    <h6>Available Offers</h6>
                                </div>
                            </div>
    
                            <ul class="offer-detail">
                                <li>
                                    <p>Combo: BB Royal Almond/Badam Californian, Extra Bold 100 gm...</p>
                                </li>
                                <li>
                                    <p>combo: Royal Cashew Californian, Extra Bold 100 gm + BB Royal Honey 500 gm</p>
                                </li>
                            </ul>
                        </div> --}}
    
                        <button type='submit'
                        class="btn theme-bg-color text-white btn-md w-100 mt-4 fw-bold">Place Order</button>
                    </div>
                </div>
            </div>
        </form>
        
    </div>
</section>    
@endsection

