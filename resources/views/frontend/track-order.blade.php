@extends('layouts.frontend')


@section('page-content')

<section class="breadscrumb-section pt-0">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-12">
                <div class="breadscrumb-contain">
                    <h2>Order Tracking</h2>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="/">
                                    <i class="fa-solid fa-house"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Order Tracking</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Order Detail Section Start -->
<section class="order-detail">
    <div class="container-fluid-lg">
        <div class="row g-sm-4 g-3">
            <div class="col-xxl-3 col-xl-4 col-lg-6">
                <div class="order-image">
                    <img src="{{$order->items()->first()->product->getMedia('images')->first()->getFullUrl()}}" class="img-fluid blur-up lazyload" alt="">
                </div>
            </div>

            <div class="col-xxl-9 col-xl-8 col-lg-6">
                <div class="row g-sm-4 g-3">
                    <div class="col-xl-4 col-sm-6">
                        <div class="order-details-contain">
                            <div class="order-tracking-icon">
                                <i data-feather="package" class="text-content"></i>
                            </div>

                            <div class="order-details-name">
                                <h5 class="text-content">Tracking Code</h5>
                                <h2 class="theme-color">{{$order->order_number}}</h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-sm-6">
                        <div class="order-details-contain">
                            <div class="order-tracking-icon">
                                <i data-feather="truck" class="text-content"></i>
                            </div>

                            <div class="order-details-name">
                                <h5 class="text-content">Products</h5>
                                @foreach ($order->items as $item)
                                {{$item->product->name}}<br />
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-sm-6">
                        <div class="order-details-contain">
                            <div class="order-tracking-icon">
                                <i class="text-content" data-feather="info"></i>
                            </div>
                            <div class="order-details-name">
                                <h5 class="text-content">Package Info</h5>
                                <h4>{{$order->special_message}}</h4>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-sm-6">
                        <div class="order-details-contain">
                            <div class="order-tracking-icon">
                                <i class="text-content" data-feather="crosshair"></i>
                            </div>

                            <div class="order-details-name">
                                <h5 class="text-content">From</h5>
                                <h4>{{$order->billing_address}}</h4>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-sm-6">
                        <div class="order-details-contain">
                            <div class="order-tracking-icon">
                                <i class="text-content" data-feather="map-pin"></i>
                            </div>

                            <div class="order-details-name">
                                <h5 class="text-content">Destination</h5>
                                <h4>{{$order->shipping_address}}</h4>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-sm-6">
                        <div class="order-details-contain">
                            <div class="order-tracking-icon">
                                <i class="text-content" data-feather="calendar"></i>
                            </div>

                            <div class="order-details-name">
                                <h5 class="text-content">Estimated Time</h5>
                                <h4>7 Frb, 05:05pm</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 overflow-hidden">
                        <ol class="progtrckr">

                            <li class="progtrckr-done">
                                <h5>Order Processing</h5>
                                <h6>{{Carbon\Carbon::parse($order->created_at)->format('g:i A')}}</h6>
                            </li>
                            <li class="progtrckr-{{
    ucwords($order->status) === 'Packed' || 
    ucwords($order->status) === 'Delivered' ? 'done' : 'todo'
}}">
                                <h5>Packed</h5>
                                <h6>{{Carbon\Carbon::parse($order->updated_at)->format('g:i A')}}</h6>
                            </li>
                            <li class="progtrckr-{{
    ucwords($order->status) === 'Packed' || 
    ucwords($order->status) === 'Delivered' ? 'done' : 'todo'
}}">
                                <h5>Shipping</h5>
                                <h6>Processing</h6>
                            </li>
                            <li class="progtrckr-{{
    ucwords($order->status) === 'Delivered' ? 'done' : 'todo'
}}">
                                <h5>Shipped</h5>
                                <h6>Shipped</h6>
                            </li>
                            <li class="progtrckr-{{
    ucwords($order->status) === 'Delivered' ? 'done' : 'todo'
}}">
                                <h5>Delivered</h5>
                                <h6>Delivered</h6>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Order Detail Section End -->

<!-- Order Table Section Start -->
<section class="order-table-section section-b-space">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table order-tab-table">
                        <thead>
                            <tr>
                                <th>Description</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Location</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Order Placed</td>
                                <td>{{Carbon\Carbon::parse($order->created_at)->format('d M Y')}}</td>
                                <td>{{Carbon\Carbon::parse($order->created_at)->format('g:i A')}}</td>
                                <td>{{$order->billing_address}}</td>
                            </tr>
                            @if (ucwords($order->status) === 'Packed' || ucwords($order->status) === 'Delivered')

                            <tr>
                                <td>Preparing to Ship</td>
                                <td>{{Carbon\Carbon::parse($order->updated_at)->format('d M Y')}}</td>
                                <td>{{Carbon\Carbon::parse($order->updated_at)->format('g:i A')}}</td>
                                <td>{{$order->shipping_address}}</td>
                            </tr>
                            @endif
                            @if (ucwords($order->status) === 'Delivered')

                            <tr>
                                <td>Shipped</td>
                                <td>{{Carbon\Carbon::parse($order->updated_at)->format('d M Y')}}</td>
                                <td>{{Carbon\Carbon::parse($order->updated_at)->format('g:i A')}}</td>
                                <td>{{$order->shipping_address}}</td>
                            </tr>
                            @endif
                            @if (ucwords($order->status) === 'Delivered')

                            <tr>
                                <td>Delivered</td>
                                <td>{{Carbon\Carbon::parse($order->updated_at)->format('d M Y')}}</td>
                                <td>{{Carbon\Carbon::parse($order->updated_at)->format('g:i A')}}</td>
                                <td>{{$order->shipping_address}}</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection