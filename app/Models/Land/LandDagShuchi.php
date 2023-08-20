<?php

namespace App\Models\Land;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandDagShuchi extends Model
{
    use HasFactory;
    protected $table = 'land_dag_shuchis';
    protected $fillable = [
        'mouza_id',
        'dag_number',
        'total_land_quantity'
    ];
}
