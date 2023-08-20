<?php

namespace App\Models\Land;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandKhatian extends Model
{
    use HasFactory;
    protected $table = 'land_khatians';
    protected $fillable = [
        'mouza_id',
        'khatian_number',
        'total_land_quantity'
    ];
}
