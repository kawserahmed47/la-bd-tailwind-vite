<?php

namespace App\Models\Land;

use App\Models\ProjectManagement\Project;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectLandOwner extends Model
{
    use HasFactory;


    public function owner()
    {
        return $this->belongsTo(LandOwner::class, 'land_owner_id', 'id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id', 'id');
    }

}
