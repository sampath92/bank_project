<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BankAccountModel extends Model
{
    protected $fillable = ['account_number', 'type', 'balance', 'customer_id'];

    protected $table = 'accounts';
}
