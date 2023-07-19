<?php

namespace App\Models\BasicSettings;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuLabel extends Model
{
    use HasFactory;

    protected $table = 'menu_labels';
    protected $fillable = [ 
        'name', 
        'bn_name',
        'slug',
        'icon',
        'description',
        'status',
    ];

    public function menus()
    {
      return  $this->hasMany(Menu::class, 'menu_label_id', 'id');
    }

}
