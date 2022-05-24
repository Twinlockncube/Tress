<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'title',
        'subject_id',
        'aim',
        'creator',
        'updater',
        'created_at',
        'updated_at',
    ];

    public $incrementing = false;

    public function attendances(){
      return $this->hasMany(Attendance::class);
    }

    public function objectives(){
      return $this->hasMany(Objective::class);
    }

    public function activities(){
      return $this->hasMany(Activity::class);
    }

    public function subject(){
      return $this->belongsTo(Subject::class);
    }

    public function class_lessons(){
      return $this->hasMany(ClassLesson::class);
    }
}
