<?php

namespace App\Models\BasicSettings;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class OrganizationOffice extends Model
{
    use HasFactory;

    protected $table = 'organization_offices';
    protected $fillable = [
        'organization_id',
        'name',
        'bn_name',
        'slug',
        'address',
        'description',
        'status'
    ];

    protected static function boot()
    {
        parent::boot();
        static::created(function ($organization_office) {
            $organization_office->slug = $organization_office->generateSlug($organization_office->name);
            $organization_office->save();
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
