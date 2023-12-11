<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Ichtrojan\Otp\Otp;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'dob',
        'phone_number'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function numero(){
        return $this->phone_number;
    }

    public function sendSms($mssg){
        //otp generation
        $apiUrl = "http://api.sparrowsms.com/v2/sms/?" . http_build_query([
            'token' => 'v2_P7mMPVea8k3vQytf7cW5xJXQj1A.ulcg',
            'from'  => 'Demo',
            'to'    => $this->phone_number,
            'text'  => $mssg
        ]);

        $response = file_get_contents($apiUrl);
        return $response;       
    }
    //returns array [status: bool,token: string,message:string]
    public function otpGenerate(){
        $otp=new Otp();
        $code=$otp->generate($this->phone_number,5,10);
        return $code;
    }
};
    