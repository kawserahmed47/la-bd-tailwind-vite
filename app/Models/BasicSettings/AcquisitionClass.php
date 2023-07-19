<?php

namespace App\Models\BasicSettings;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcquisitionClass extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'bn_name',
        'slug',
        'icon',
        'description',
        'status',
        'order_id',
        'parent_id'
    ];
}
