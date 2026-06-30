<?php

namespace App\Services;

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

class SettingsService
{

    function getSettings()
    {
        return Cache::rememberForever('settings', function () {
            return Setting::pluck('value', 'key')->toArray();
        });
    }

    function setGlobalSettings()
    {
        $settings = $this->getSettings();
        config()->set('settings', $settings);
    }

    function clearCachedSettings()
    {
        Cache::forget('settings');
    }

    // public function editSettings(SettingsService $settingsService)
    // {
    //     $settings = $settingsService->getSettings();
    //     return view('admin.setting.sections.general-settings', compact('settings'));
    // }

    public function boot(SettingsService $settingsService)
    {
        if (app()->runningInConsole()) {
            return; // avoid during artisan commands like migrate
        }

        $settingsService->setGlobalSettings(); // ✅ inject config('settings') values at runtime
    }
}