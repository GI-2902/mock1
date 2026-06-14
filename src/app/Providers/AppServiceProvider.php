<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /*Password::defaults(static fn() => Password::min(8)

            ->rules([

                function ($attribute, $value) {
                    $pass = Auth::User()->password;

                    return Hash::check($value, $pass);
                },

                function () {
                    return 'FFFFFFFFFFFFFFFF';
                }

            ]));*/
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /*Password::defaults(function () {

            return Password::min(8)

                ->rules([

                    function ($attribute, $value) {
                        $pass = Auth::User()->password;

                        return Hash::check($value, $pass);
                    },

                    function () {
                        return 'FFFFFFFFFFFFFFFF';
                    }

                ]);
        });*/
    }
}
