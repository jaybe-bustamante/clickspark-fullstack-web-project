<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    protected $fillable = ['project_id', 'file_path'];
    
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
