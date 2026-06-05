<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'asset_tag',
        'item_name',
        'category',
        'brand',
        'model',
        'serial_number',
         'date_purchased',
        'status',
        'assigned_to',
        'date_assigned',
        'remarks',
      
    ];

    protected $casts = [
          'date_purchased' => 'date',
        'date_assigned' => 'date',
    ];
}