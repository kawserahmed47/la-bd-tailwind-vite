<?php

namespace App\Models\BasicSettings;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class OrganizationDesignation extends Model
{
    use HasFactory;
    protected $table = 'organization_designations';
    protected $fillable = [
        'organization_id',
        'name',
        'bn_name',
        'slug',
        'description',
        'status'
    ];

    protected static function boot()
    {
        parent::boot();
        static::created(function ($organization_designation) {
            $organization_designation->slug = $organization_designation->generateSlug($organization_designation->name);
            $organization_designation->save();
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

    public function organization()
    {
        return $this->belongsTo(Organization::class, 'organization_id', 'id');
    }



}
