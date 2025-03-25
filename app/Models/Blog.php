<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'blogPostImageURL',
        'user_id'
    ];

    // public function getActivitylogOptions()
    // {
    //     return LogOptions::defaults()->logFillable();
    // }
    

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
