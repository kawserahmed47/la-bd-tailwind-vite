<?php

namespace App\Models\BasicSettings;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizationOfficer extends Model
{
    use HasFactory;

    public function office()
    {
        return $this->belongsTo(OrganizationOffice::class, 'organization_office_id', 'id');
    }

    public function designation()
    {
        return $this->belongsTo(OrganizationDesignation::class, 'organization_designation_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
