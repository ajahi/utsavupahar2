@extends('layouts.test')

@section('page-content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-table">
                <div class="card-body">
                    <div class="title-header option-title">
                        <h5>Order List</h5>
                        <div class="m-3">
                            <form action="#" method="get">
                                <input type="text" name="search" placeholder="Search products by id or name" value="{{ request('query') }}">
                                <button class="form-search" type="submit"><i class="ri-search-line"></i></button>
                            </form>
                            
                        </div>
                        <a href="#" class="btn btn-solid">Download all orders</a>
                    </div>
                    <div>
                        <div class="table-responsive">
                            <table class="table all-package order-table theme-table" id="table_id">
                                <thead>
                                    <tr>
                                        <!-- Replaced "Order Image" with "Recipient Name" -->
                                        <th>Order Code</th>
                                        <th>Date</th>
                                        <th>Payment Method</th>
                                        <th>Delivery Status</th>
                                        <th>Amount</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($orders as $order)
                                    <tr data-bs-toggle="offcanvas" href="#order-details">
                                       <!-- Display recipient name -->
                                       
                                        <td>
                                            <a href="{{route('order.show',$order->id)}}">
                                                {{ $order->order_number }}
                                            </a>
                                        </td>
                                    
                                        <td>{{ $order->created_at }}</td>
                                        <td>{{ $order->payment_method }}</td>
                                        <td class="order-{{ $order->status }}">
                                            <span>{{ $order->status }}</span>
                                        </td>
                                        <td>${{ number_format($order->total_amount, 2) }}</td>
                                    
                                        <td>
                                            <ul>
                                                <li>
                                                    <a href="{{ route('order.show', $order->id) }}">
                                                        <i class="ri-eye-line"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('order.edit', $order->id) }}">
                                                        <i class="ri-pencil-line"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModalToggle">
                                                        <i class="ri-delete-bin-line"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="btn btn-sm btn-solid text-white"
                                                        href="#">
                                                        Tracking
                                                    </a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            
                        </div>
                        <span class="form-control">{{$orders->links()}} </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
