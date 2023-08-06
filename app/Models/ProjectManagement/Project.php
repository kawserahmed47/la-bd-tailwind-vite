<?php

namespace App\Models\ProjectManagement;

use App\Models\BasicSettings\District;
use App\Models\BasicSettings\Ministry;
use App\Models\BasicSettings\Organization;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Project extends Model
{
    use HasFactory;

    protected $table = 'projects';
    protected $fillable = [ 
        'project_id',
        'name', 
        'bn_name',
        'slug',
        'description',
        'status',
        'organization_id',
        'ministry_id',
        'district_id',
        'created_by',
        'updated_by' 
    ];

    protected static function boot()
    {
        parent::boot();
        static::created(function ($project) {
            $project->slug = $project->generateSlug($project->name);
            $project->save();
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

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id', 'id');
    }

    public function ministry(){
        return $this->belongsTo(Ministry::class, 'ministry_id', 'id');
    }

    public function organization(){
        return $this->belongsTo(Organization::class, 'organization_id', 'id');
    }

    public function organization_officers()
    {
        return $this->hasMany(ProjectOrganizationOfficer::class, 'project_id', 'id');
    }


}
