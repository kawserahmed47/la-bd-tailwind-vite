<?php

namespace App\Models\ProjectManagement;

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

}
