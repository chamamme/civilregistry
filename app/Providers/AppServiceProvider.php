<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
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

        Schema::defaultStringLength(191);
        //Custom Validators
        Validator::extend('phone', function($attribute, $value, $parameters, $validator) {

            if($value){
                return preg_match('%^(?:(?:\(?(?:00|\+)([1-4]\d\d|[1-9]\d?)\)?)?[\-\.\ \\\/]?)?((?:\(?\d{1,}\)?[\-\.\ \\\/]?){0,})(?:[\-\.\ \\\/]?(?:#|ext\.?|extension|x)[\-\.\ \\\/]?(\d+))?$%i', $value) && strlen($value) >= 10;
            }
            return true;//allow empty strings
        });

        Validator::replacer('phone', function($message, $attribute, $rule, $parameters) {
            return 'Please enter a valid phone number';
        });

        Validator::extend('no_numeric', function($attribute, $value, $parameters, $validator) {
            if(preg_match('/[0-9]/',$value)){
                return false;
            }
            return true;
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
