<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $fillable = [
      'assessment_id',
      'student_id',
      'score',
    ];

    public function assessment(){
      return $this->belongsTo(Assessment::class);
    }
}
