<?php

namespace TomatoPHP\FilamentSettingsHub\Models;

use Eloquent as Model;

class Setting extends Model
{

    protected $table = 'settings';

    protected $casts = [
        'payload' => "json"
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public $fillable = [
        'id',
        'name',
        'group',
        'payload'
    ];
}
