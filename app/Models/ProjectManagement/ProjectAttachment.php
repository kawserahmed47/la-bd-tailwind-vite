<?php

namespace App\Models\ProjectManagement;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectAttachment extends Model
{
    use HasFactory;

    protected $table = 'project_attachments';
    protected $fillable = [ 
        'project_id',
        'name',
        'type',
        'size', 
        'created_by',
        'updated_by' 
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id', 'id');
    }

}
