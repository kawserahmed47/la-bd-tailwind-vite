<?php

namespace App\Models\ProjectManagement;

use App\Models\BasicSettings\OrganizationOfficer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectOrganizationOfficer extends Model
{
    use HasFactory;

    public function officer(){
        return $this->belongsTo(OrganizationOfficer::class, 'organization_officer_id', 'id');
    }
}
