@extends('layouts.frontend')

@section('page-content')
    
<section class="breadscrumb-section pt-0">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-12">
                <div class="breadscrumb-contain">
                    <h2>OTP</h2>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="index.html">
                                    <i class="fa-solid fa-house"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active">OTP</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- log in section start -->
<section class="log-in-section otp-section section-b-space">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-xxl-6 col-xl-5 col-lg-6 d-lg-block d-none ms-auto">
                <div class="image-contain">
                    <img src="/frontassets/images/inner-page/otp.png" class="img-fluid" alt="user">
                </div>
            </div>

            <div class="col-xxl-4 col-xl-5 col-lg-6 col-sm-8 mx-auto">
                <div class="d-flex align-items-center justify-content-center h-100">
                    <form action="{{route('otp.verification')}}" method='post'>
                        @csrf

                        <div class="log-in-box">
                            <div class="log-in-title">
                                
                                @if (Session::has('otp_error'))
                                    <div class="alert alert-info">{{ Session::get('otp_error')}}</div>
                                @endif                                   <h3 class="text-title">Please enter the one time password to verify your account</h3>
                                <h5 class="text-content">A code has been sent to <span>****{{substr($num,5-9)}}</span></h5>
                            </div>
                            <input type="hidden" name="phone_number" id="" value={{$num}}>
    
                            <div id="otp" class="inputs d-flex flex-row justify-content-center">
                                <input class="text-center form-control rounded" name="otp[]" type="text" id="first" maxlength="1"
                                    placeholder="0">
                                <input class="text-center form-control rounded" name="otp[]" type="text" id="second" maxlength="1"
                                    placeholder="0">
                                <input class="text-center form-control rounded" name="otp[]" type="text" id="third" maxlength="1"
                                    placeholder="0">
                                <input class="text-center form-control rounded" name="otp[]" type="text" id="fourth" maxlength="1"
                                    placeholder="0">
                                <input class="text-center form-control rounded" name="otp[]" type="text" id="fifth" maxlength="1"
                                    placeholder="0">
                                
                            </div>
    
                            <div class="send-box pt-4">
                                <h5>Didn't get the code? <a href="javascript:void(0)" class="theme-color fw-bold">Resend
                                        It</a></h5>
                            </div>
    
                            <button  class="btn btn-animation w-100 mt-3"
                                type="submit">Validate</button>
                        </div>

                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
