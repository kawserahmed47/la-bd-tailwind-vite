<?php

namespace App\Models\BasicSettings;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    use \Bkwld\Cloner\Cloneable;


    protected $table = 'menus';
    protected $fillable = [ 
        'order_id', 
        'menu_label_id',
        'parent_id',
        'name',
        'bn_name',
        'slug',
        'icon',
        'description',
        'status'
    ];

    public function label()
    {
      return  $this->belongsTo(MenuLabel::class, 'menu_label_id', 'id');
    }

    public function child()
    {
        return  $this->hasMany(Menu::class, 'parent_id', 'id');
    }

    public function parent()
    {
        return $this->belongsTo(Menu::class, 'parent_id', 'id');
    }
}
