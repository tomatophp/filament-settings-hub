<?php

namespace TomatoPHP\FilamentSettingsHub\Models;

use GeneaLabs\LaravelModelCaching\CachedModel;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;

class Setting extends CachedModel
{
    use Cachable;

    protected $cachePrefix = 'tomato_settings_';

    protected $table = 'settings';

    protected $casts = [
        'payload' => 'json',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public $fillable = [
        'id',
        'name',
        'group',
        'payload',
    ];
}
