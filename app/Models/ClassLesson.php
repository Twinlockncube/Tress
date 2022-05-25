<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassLesson extends Model
{
    use HasFactory;
    protected $fillable = [
        'class_group_id',
        'lesson_id',
        'start_date',
        'end_date',
        'completed',
        'evaluation',
        'creator',
        'updater',
        'created_at',
        'updated_at',
    ];
    public function lesson(){
      return $this->belongsTo(Lesson::class);
    }
}
