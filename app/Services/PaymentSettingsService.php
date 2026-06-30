<?php

namespace App\Services;

use App\Models\PaymentSetting;
use App\Models\Setting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;

class PaymentSettingsService
{
    // public $settings;

    // public function __construct()
    // {
    //     // Prevent error before 'cache' table is created
    //     if (Schema::hasTable('cache')) {
    //         $this->settings = Cache::get('laravel_cache_payment');
    //     } else {
    //         $this->settings = [];
    //     }
    // }

    function getSettings()
    {
        return Cache::rememberForever('payment', function () {
            return PaymentSetting::pluck('value', 'key')->toArray();
        });
    }

    function setGlobalSettings()
    {
        $settings = $this->getSettings();
        config()->set('payment', $settings);
    }

    function clearCachedSettings()
    {
        Cache::forget('payment');
    }
}
