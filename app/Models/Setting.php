<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Artisan;
use Log;
use Cache;

class Setting extends Model
{
    protected $table = 'settings';


    protected $guarded = [];

    public function updateConfig($data)
    {	
        
        $this->config = @$this->config ? array_merge($this->config, $data) : $data;
        // Log::info(@$this->config);

        // invalidate the obsolete cache
         Artisan::call('cache:clear');
        // Cache::forget('general');

        $this->save();
    }

    /*
    |--------------------------------------------------------------------------
    | Getters / Setters
    |--------------------------------------------------------------------------
    */

    /**
     * @return array
     */
    public function getConfigAttribute()
    {
        $config = json_decode($this->attributes['config'], true);

        return $config ? $config : [];
    }

    /**
     * @return array
     */
    public function getValidationRulesAttribute()
    {
        $validationRules = json_decode($this->attributes['validation_rules'], true);

        return $validationRules ? $validationRules : [];
    }

    /**
     * @param array
     */
    public function setConfigAttribute(array $config)
    {
        $this->attributes['config'] = json_encode($config);
    }
    
    public function removeEmail($email)
    {
        $config = $this->config;

        $key = array_search($email, $config['additional_emails']);

        // $key might be 0, hence the strict comparison
        if($key !== false) unset($config['additional_emails'][$key]);

        $this->config = $config;

        return $this;
    }    

}
