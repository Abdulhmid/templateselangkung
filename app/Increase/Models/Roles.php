<?php

namespace App\Increase\Models;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $table      = 'roles';
    protected $primaryKey = 'id';
    protected $guarded    = ['id'];

    /**
     * Rules
     *
     * @var array
     */
    public static $rules = [
        'description' => 'required'
    ];

}
