<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;

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
        // https://blog.capilano-fw.com/?p=11314
        // 翻訳データを Inertia へ渡す
        $locale_data = [];
        $locales = ['ja']; // できれば Enum での管理がベターです

        foreach ($locales as $locale) {
            $json_path = lang_path($locale .'.json');
            $json_content = file_get_contents($json_path);
            $locale_data[$locale] = json_decode($json_content, true);
        }

        $default_locale = config('app.locale');
        $current_locale = request('locale', $default_locale);

        Inertia::share('locale', [
            'currentLocale' => $current_locale,
            'localeData' => $locale_data,
        ]);
    }
}
