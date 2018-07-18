<?php

namespace App;

use Laratrust\Models\LaratrustPermission;

class Permission extends LaratrustPermission
{
    //
    //
     public $fillable = [
        'name',
        'display_name',
        'description'
    ];

    /**
     * Validation permissions
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'display_name' => 'required'
    ];
}
