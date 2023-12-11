@extends('layouts.test')

@section('page-content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="title-header title-header-block package-card">
                        <div>
                            <h5>Order {{$order->order_number}}</h5>
                        </div>
                        <div class="card-order-section">
                            <ul>
                                <li>{{$order->created_at->toDateString()}}</li>
                                <li>{{count($orderDetail)}}</li>
                                <li>Total RS {{$order->total_amount}}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="bg-inner cart-section order-details-table">
                        <div class="row g-4">
                            <div class="col-xl-8">
                                <div class="table-responsive table-details">
                                    <table class="table cart-table table-borderless">
                                        <thead>
                                            <tr>
                                                <th colspan="2">Items ({{$order->status}})</th>
                                                <th class="text-end" colspan="2">
                                                    <a href="#"
                                                        class="theme-color">Edit
                                                        Status</a>
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach($orderDetail as $item)
                                            <tr class="table-order">
                                                <td>
                                                    <a href="javascript:void(0)">
                                                        <img src={{$item->product->getMedia('images')->first()->getFullUrl()}}
                                                            class="img-fluid blur-up lazyload" alt="">
                                                    </a>
                                                </td>
                                                <td>
                                                    <p>Product Name</p>
                                                    <h5>{{$item->product->name}}</h5>
                                                    <span>Unit Price:{{$item->unit_price}}</span>
                                                </td>
                                                <td>
                                                    <p>Quantity</p>
                                                    <h5>{{$item->quantity}}</h5>
                                                </td>
                                                <td>
                                                    <p>Price</p>
                                                    <h5>RS{{$item->total_price}}</h5>
                                                </td>
                                            </tr>
                                            @endforeach
                                            
                                        </tbody>

                                        <tfoot>
                                            <tr class="table-order">
                                                <td colspan="3">
                                                    <h5>Subtotal :</h5>
                                                </td>
                                                <td>
                                                    <h4>RS </h4>
                                                </td>
                                            </tr>

                                            <tr class="table-order">
                                                <td colspan="3">
                                                    <h5>Shipping :</h5>
                                                </td>
                                                <td>
                                                    <h4>RS 100</h4>
                                                </td>
                                            </tr>

                                            

                                            <tr class="table-order">
                                                <td colspan="3">
                                                    <h4 class="theme-color fw-bold">Total Price :</h4>
                                                </td>
                                                <td>
                                                    <h4 class="theme-color fw-bold">RS{{$order->total_amount}}</h4>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>

                            <div class="col-xl-4">
                                <div class="order-success">
                                    <div class="row g-4">
                                        <h4>summery</h4>
                                        <ul class="order-details">
                                            <li>Order ID: {{$order->order_number}}</li>
                                            <li>Order Date: {{$order->created_at->toDateString()}}</li>
                                            <li>Order Total: RS.{{$order->total_amount}}</li>
                                        </ul>

                                        <h4>shipping address</h4>
                                        <ul class="order-details">
                                            <li>{{$order->shipping_address}}</li>
                                            
                                        </ul>

                                        <div class="payment-mode">
                                            <h4>payment method</h4>
                                            <p>{{$order->payment_method}}</p>
                                        </div>

                                        <div class="delivery-sec">
                                            <h3>expected date of delivery: <span>{{$order->preferred_delivery_date ? $order->preferred_delivery_date : $expected_delivery_date->toDateString()}}</span>
                                            </h3>
                                            <a href="order-tracking.html">track order</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- section end -->
                </div>
            </div>
        </div>
    </div>
</div>


@endsection