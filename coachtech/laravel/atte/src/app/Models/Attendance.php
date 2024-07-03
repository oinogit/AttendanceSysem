<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    // protected $guarded=['id'];

    protected $fillable = [
        'user_id',
        'date',
        'start_time',
        'end_time',
        'total'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function rests() {
        return $this->hasMany(Rest::class);
    }
}
