<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerModel extends Model
{
    protected $fillable = ['full_name', 'address', 'nic', 'mobile'];
}
