<?php namespace App\Providers;

use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class ConfigServiceProvider extends ServiceProvider
{

    /**
     * Sets new config values either from cache or the database
     *
     * @param String $key - the config identifier that is used in the database, ex: 'general', 'mail',  etc..
     */
    private function applyConfigFromDatabase($key)
    {
        // load new configs either from cache or the database
        $configFromDatabase = Cache::remember($key, Carbon::now()->addMinutes(10), function () use ($key) {
            return Setting::where('key', $key)->first()->config;
        });

        // get existing(from the local config files) configs to overwrite them with the ones from the database
        // also preserving the non-conflicting values from the files(those values which are not conflicting
        // with the values from the database)
        $localConfig = Config::get($key) ?: [];

        // Need to set the mailgun variables in services
        if ($key == 'mail' && $configFromDatabase['driver'] == 'mailgun') {
            config(['services.mailgun.domain' => $configFromDatabase['domain']]);
            config(['services.mailgun.secret' => $configFromDatabase['secret']]);
        }

        Config::set($key, array_merge($localConfig, $configFromDatabase));
        
        
        //Config::set('app.timezone', config('general.timezone'));
    }

    /**
     * End-user provided configs, which override the app's configs should be registered here
     *
     * @link https://laravel.com/docs/5.0/providers#basic-provider-example Read the boot method description
     */
    public function boot()
    {
        // check if 'settings' table exists. This check prevents
        // 'table "settings" not found error' from occuring
        // when initial migration is performed in the new project
        if (Schema::hasTable('settings')) {
            $settingKeys = Cache::remember('settingKeys', Carbon::now()->addMinutes(10), function () {
                return Setting::pluck('key');
            });

            foreach ($settingKeys as $settingKey) {
                $this->applyConfigFromDatabase($settingKey);
            }

            //\Cache::forget('app.timezone');

            //$timezone_config = Config::get('app') ?: [];
            //print_r($timezone_config);
            //Config::set('app', array_merge($timezone_config, ['timezone'=>config('general.timezone')]));
            date_default_timezone_set(config('general.timezone')?:"America/Los_Angeles");
        }

        if (config('site.disable_emails') && config('site.disable_emails')==1) {
            Config::set('mail.driver', 'log');
        }
    }

    /**
     * Overwrite any vendor / package configuration.
     *
     * This service provider is intended to provide a convenient location for you
     * to overwrite any "vendor" or package configuration that you may want to
     * modify before the application handles the incoming request / command.
     *
     * @return void
     */
    public function register()
    {
        config([
            //
        ]);
    }

}
