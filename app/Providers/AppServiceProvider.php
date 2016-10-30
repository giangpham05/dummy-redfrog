<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use App\Models\Client;

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


        Validator::extend('due_date_for_this_survey', function($attribute, $value, $parameters, $validator) {
            $label = 'dueDateFor'.$value;
            $dateReturn = array_get($validator->getData(), $label, 'default');
//            if($dateReturn=='default'){
//                return false;
//            }
//            else if($dateReturn ==''){
//                return false;
//            }
            return false;
        });


        Validator::extend('require_client', function($attribute, $value, $parameters, $validator) {
            if($value == 'default')
            {
                return false;
            }
            else
            {
                return true;
            }
        });

        Validator::extend('client_exist', function($attribute, $value, $parameters, $validator) {
            $client = Client::where('id','=',$value)->first();
            if($client != null)
            {
                return false;
            }
            else
            {
                return true;
            }
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
