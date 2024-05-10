<?php

namespace App\Providers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('custom_password_rule', function ($attribute, $value, $parameters, $validator) {
            // Your custom password validation logic here
            return preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/', $value);
        });

        // Add a custom error message for your rule
        Validator::replacer('custom_password_rule', function ($message, $attribute, $rule, $parameters) {
            return 'The password must be at least 8 characters long and contain a mix of uppercase letters, lowercase letters, numbers, and symbols (@$!%*?&).';
        });
    }
}
