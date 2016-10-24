<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('at_least_one_option', function($attribute, $value, $parameters, $validator) {
            $isEmptyOrWhiteSpace = true;
            if(!empty($value))
            {
                foreach ($value as $element){
                    if (strlen($element) > 0 && strlen(trim($element)) !== 0){
                        $isEmptyOrWhiteSpace = false;
                    }
                }

                if(!$isEmptyOrWhiteSpace){
                    return true;
                }
                else{
                    return false;
                }
            }
            return false;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
