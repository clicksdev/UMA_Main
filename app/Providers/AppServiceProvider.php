<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('spatie.permission', function ($app) {
            return app(config('permission.models.permission'));
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }

        Schema::defaultStringLength(191);

        Validator::extend('old_password', function ($attribute, $value, $parameters, $validator) {
            return Hash::check($value, current($parameters));
        });

        $settings = Setting::with('media')->get();

        $settingsArray = $settings->mapWithKeys(function ($setting) {
            $mediaUrl = $setting->hasMedia($setting->key) ? $setting->getFirstMediaUrl($setting->key) : null;

            return [
                $setting->key => [
                    'value'     => $setting->value,
                    'media_url' => $mediaUrl
                ]
            ];
        })->toArray();

        view()->share('settingsArray', $settingsArray);
    }
}
