<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionOfficer extends Model
{
    use HasFactory;

    protected $table = 'section_officers';
    protected $fillable = [
        'user_id',
        'section_id',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id', 'id');
    }

}
