@extends('layouts.test')
@section('page-content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-table">
                <div class="card-body">
                    <div class="title-header option-title">
                        <h5>Coupon List</h5>
                        <div class="right-options">
                            <ul>
                                <li>
                                    <a class="btn btn-solid" href="{{ route('coupon.create') }}" title="Create a coupon">Add Coupon</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div>
                        <div class="table-responsive">
                            <table class="table all-package coupon-list-table table-hover theme-table" id="table_id">
                                <thead>
                                    <tr>
                                        <th>
                                            <span class="form-check user-checkbox m-0 p-0">
                                                <input class="checkbox_animated checkall" type="checkbox" value="">
                                            </span>
                                        </th>
                                        <th>Code</th>
                                        <th>Description</th>
                                        <th>Discount Type</th>
                                        <th>Discount Value</th>
                                        <th>Status</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($coupons as $coupon)
                                    <tr>
                                        <td>
                                            <span class="form-check user-checkbox m-0 p-0">
                                                <input class="checkbox_animated check-it" type="checkbox" value="">
                                            </span>
                                        </td>
                                        <td>{{ $coupon->code }}</td>
                                        <td>{{ $coupon->description }}</td>
                                        <td>{{ $coupon->discount_type }}</td>
                                        <td class="theme-color">
                                            @if ($coupon->discount_type === 'Percent')
                                                {{ $coupon->discount_value }}%
                                            @elseif ($coupon->discount_type === 'fixed')
                                                ${{ $coupon->discount_value }}
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td class="menu-status">
                                            <span class="{{ $coupon->is_active ? 'success' : 'danger' }}">
                                                {{ $coupon->is_active ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td>
                                            <ul>
                                                <li>
                                                    <a href="{{ route('coupon.edit', $coupon) }}">
                                                        <i class="ri-pencil-line"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <form action="{{route('coupon.delete',$coupon)}}" method="post" style="display:inline" 
                                                        onclick="return confirm('Are you sure you want to delete this coupon?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"> <i class="ri-delete-bin-line"></i></button>
                                                       
                                                    </form>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
