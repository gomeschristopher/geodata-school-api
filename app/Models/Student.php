<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'last_name',
        'age', 'has_scholarship'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
