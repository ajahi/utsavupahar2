<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SmsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('sms', function () {
            return new class {
                public function sendSms($to, $message)
                {
                    $apiUrl = "http://api.sparrowsms.com/v2/sms/?" . http_build_query([
                        'token' => 'v2_Qd9zRgjgwU5aZBJ6TUKdBTpkwfZ.w5JU',
                        'from'  => 'Demo',
                        'to'    => $to,
                        'text'  => $message,
                    ]);

                    $response = file_get_contents($apiUrl);

                    return $response;
                }
            };
        });

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
