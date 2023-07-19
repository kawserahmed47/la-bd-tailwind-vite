<?php

namespace App\Models\BasicSettings;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'name', 
        'bn_name',
        'slug',
        'status' 
    ];

    protected static function boot()
    {
        parent::boot();
        static::created(function ($division) {
            $division->slug = $division->generateSlug($division->name);
            $division->save();
        });
    }

    private function generateSlug($name)
    {
        if (static::whereSlug($slug = Str::slug($name))->exists()) {
            $max = static::whereName($name)->latest('id')->skip(1)->value('slug');
            if (isset($max[-1]) && is_numeric($max[-1])) {
                return preg_replace_callback('/(\d+)$/', function($matches) {
                    return $matches[1] + 1;
                }, $max);
            }
            return "{$slug}-2";
        }
        return $slug;
    }  

}
