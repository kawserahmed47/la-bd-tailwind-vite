<?php

namespace App\Models\BasicSettings;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Ministry extends Model
{
    use HasFactory;
    protected $table = 'ministries';
    protected $fillable = [
        'name',
        'bn_name',
        'slug',
        'url',
        'address',
        'description',
        'status'
    ];

    protected static function boot()
    {
        parent::boot();
        static::created(function ($ministry) {
            $ministry->slug = $ministry->generateSlug($ministry->name);
            $ministry->save();
        });
    }

    private function generateSlug($name)
    {
        if (static::whereSlug($slug = Str::slug($name, '-'))->exists()) {
            $max = static::whereName($name)->latest('id')->skip(1)->value('slug');
            if (isset($max[-1]) && is_numeric($max[-1])) {
                return preg_replace_callback('/(\d+)$/', function ($matches) {
                    return $matches[1] + 1;
                }, $max);
            }
            return "{$slug}-2";
        }
        return $slug;
    }
}
