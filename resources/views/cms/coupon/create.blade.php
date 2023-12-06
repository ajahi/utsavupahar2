@extends('layouts.test')

@section('page-content')

<div class="row">
    <div class="col-12">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="title-header option-title">
                            <h5>Create Coupon</h5>
                        </div>
                        

                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel">
                                <form class="theme-form theme-form-2 mega-form" method="POST" action="{{ route('coupon.store') }}">
                                    @csrf

                                    <div class="row">
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-lg-2 col-md-3 mb-0">Coupon Title</label>
                                            <div class="col-md-9 col-lg-10">
                                                <input class="form-control" type="text" name="title" placeholder="50% OFF ON DOG FOOD">
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="col-lg-2 col-md-3 col-form-label form-label-title">Coupon Code</label>
                                            <div class="col-md-6 col-lg-6">
                                                <input class="form-control" type="text" name="code" placeholder="DOGLOVER">
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="col-lg-2 col-md-3 col-form-label form-label-title">Start Date</label>
                                            <div class="col-md-4 col-lg-4">
                                                <input class="form-control" type="date" name="start_date">
                                            </div>
                                            <label class="col-lg-2 col-md-3 col-form-label form-label-title">End Date</label>
                                            <div class="col-md-4 col-lg-4S">
                                                <input class="form-control" type="date" name="end_date">
                                            </div>
                                        </div>


                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-lg-2 col-md-3 mb-0">Active</label>
                                            <div class="col-md-10">
                                                <div class="form-check user-checkbox ps-0">
                                                    <input class="checkbox_animated check-it" type="checkbox"  id="flexCheckDefault" name="is_active">
                                                    <label class="form-label-title col-md-2 mb-0">Active</label>
                                                
                                                    <input class="checkbox_animated check-it" type="checkbox"  id="flexCheckDefault" >
                                                    <label class="form-label-title col-md-2 mb-0">Allow Free <br> Shipping</label>
                                                </div>
                                            </div>
                                            
                                            
                                               
                                            
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="col-lg-2 col-md-3 col-form-label form-label-title">Max Usage</label>
                                            <div class="col-md-9 col-lg-10">
                                                <input class="form-control" type="number" name="max_uses" placeholder="100">
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="col-sm-2 col-form-label form-label-title">Discount Type</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="discount_type">
                                                    <option disabled>--Select--</option>
                                                    <option value="Percent">Percent</option>
                                                    <option value="Fixed">Fixed</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-lg-2 col-md-3 mb-0">Discount Value</label>
                                            <div class="col-md-9 col-lg-10">
                                                <input class="form-control" type="number" name="discount_value">
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="col-lg-2 col-md-3 col-form-label form-label-title">Minimum Order Amount</label>
                                            <div class="col-md-9 col-lg-10">
                                                <input class="form-control" type="number" name="min_order_amount" placeholder='2'>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-solid">Create Coupon</button>
                                </form>
                            </div>

                            <!-- Include the code for the "Restriction" and "Usage" tabs here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    
@endsection