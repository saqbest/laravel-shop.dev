<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->resolving('payum.builder', function (\Payum\Core\PayumBuilder $payumBuilder) {
            $payumBuilder
                // this method registers filesystem storages, consider to change them to something more
                // sophisticated, like eloquent storage
                ->addDefaultStorages()
                ->addGateway('paypal_ec', [
                    'factory' => 'paypal_express_checkout',
                    'username' => 'saqoxachatryan1988-facilitator@gmail.com',
                    'password' => 'AWQUI56y9hykFOq2Hwspc413zdxPEQxlkxJ_PmwsWmjxEHdGoX3zuFo1wbJIV3Mwibc0VvQbnQ-b1FDk',
                    'signature' => 'EGULkQ0Hw0cWZrfAlg-L_308U-Z3c2dyHsujxaaTAVxeAjLELV8jJyhrCmC8q5d5c-EBfdWkylNQObAg',
                    'sandbox' => true
                ]);
        });
    }
}
