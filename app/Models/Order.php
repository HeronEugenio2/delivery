<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'qtd',
        'menu_id',
        'user_id',
    ];
}
