<?php

namespace App\Increase\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';
    protected $guarded    = ['id'];

    public function role() {
        return $this->hasOne('App\Increase\Models\Roles', 'id', 'role_id');
    } 

    /**
     * Rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'birth' => 'required',
        'gender' => 'required',
        'phone' => 'required',
        'telp' => 'required',
        'active' => 'required',
        'role_id' => 'required',
        'photo'  => 'max:2000|mimes:jpeg,gif,png',
    ];

}
