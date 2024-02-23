<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['project_id', 'body', 'user_id', 'file_path'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    

    use HasFactory;
}
