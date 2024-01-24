<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use App\Http\Requests\RegistrationRequest;
use Ichtrojan\Otp\Otp;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(RegistrationRequest $request)
    {

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'dob' => $request->dob,
            'phone_number' => $request->phone_number

        ]);
        // assign customer role
        $user->assignRole('Customer');

        $otp = $user->otpGenerate();
        //Registration otp message
        $message = 'Dear ' . strtok($user->name, ' ') . ', Thank you for registering with UtsavUpahar.'  . $otp->message . 'Your OTP is .' . $otp->token;

        $user->sendSms($message);

        event(new Registered($user));



        return redirect()->route('otp.show', $user->phone_number);
    }

    public function otpShow($num)
    {
        return view('Otp', ['num' => $num]);
    }

    public function OtpVerification(Request $request)
    {
        $otp = new Otp();
        $res = $otp->validate($request->phone_number, implode("", $request->otp));

        $user = User::where('phone_number', $request->phone_number)->first();

        // if validated with otp user is loggedin
        if ($res->status) {
            Auth::login($user);
            return redirect(RouteServiceProvider::HOME);
        } //else returned back to otp page with error message
        return redirect()->back()->with('otp_error', $res->message . '.Check your OTP and phone number');
    }
}
