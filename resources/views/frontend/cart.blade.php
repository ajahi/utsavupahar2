@extends('layouts.frontend')
@section('page-content')

<section class="breadscrumb-section pt-0">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-12">
                <div class="breadscrumb-contain">
                    <h2>Cart</h2>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="index.html">
                                    <i class="fa-solid fa-house"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Cart</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Cart Section Start -->
<form action="{{route('checkout')}}" method='get'>
<section class="cart-section section-b-space">
    <div class="container-fluid-lg">
        <div class="row g-sm-5 g-3">
            <div class="col-xxl-9">
                <div class="cart-table">

                    @livewire('cart-item')

                </div>
            </div>

            <div class="col-xxl-3">
                <div class="summery-box p-sticky">
                    <div class="summery-header">
                        <h3>Cart Total</h3>
                    </div>

                    <div class="summery-contain">
                        {{-- <div class="coupon-cart">
                            <h6 class="text-content mb-2">Coupon Apply</h6>
                            <div class="mb-3 coupon-box input-group">
                                <input type="email" class="form-control" id="exampleFormControlInput1"
                                    placeholder="Enter Coupon Code Here...">
                                <button class="btn-apply">Apply</button>
                            </div>
                        </div> --}}
                        <ul>
                            <li>
                                <h4>Subtotal</h4>
                                <h4 class="price">RS. {{Cart::subtotal()}}</h4>
                            </li>

                            <li>
                                <h4>Coupon Discount</h4>
                                <h4 class="price">(-) 0.00</h4>
                            </li>

                            <li class="align-items-start">
                                <h4>Shipping (Freeshipping)</h4>
                                <h4 class="price text-end">RS .100 </h4>
                            </li>
                        </ul>
                    </div>

                    <ul class="summery-total">
                        <li class="list-total border-top-0">
                            <h4>Total (NRP)</h4>
                            <h4 class="price theme-color">RS. {{Cart::total()}}</h4>
                        </li>
                    </ul>

                    <div class="button-group cart-button">
                        <ul>
                            <li>
                                <button type="submit"
                                    class="btn btn-animation proceed-btn fw-bold">Process To Checkout</button>
                            </li>

                            <li>
                                <button 
                                    class="btn btn-light shopping-button text-dark"><a href="{{url()->previous()}}"><i class="fa-solid fa-arrow-left-long"></i>Return To Shopping</a>
                                    </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</form>
    
@endsection