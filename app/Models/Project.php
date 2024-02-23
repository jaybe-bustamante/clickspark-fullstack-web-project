<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'service_type', 'title', 'industry', 'description', 
        'target_audience', 'design_preference', 'color_preference', 'notes', 'amount','is_paid','status'
    ];

    protected $casts = [
        'color_preference' => 'array',
        'is_paid' => 'boolean',
    ];

    public function attachments()
    {
        return $this->hasMany(Attachment::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
