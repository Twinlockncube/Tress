<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassGroup extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    public $incrementing = false;
    protected $fillable = [
      'id',
      'name',
      'description',
      'grade',
      'teacher_id',
    ];

    public function students()
      {
        return $this->hasMany(Student::class);
      }

    public function subjects(){
        return $this->belongsToMany(Subject::class);
    }

    public function teacher()
      {
          return $this->hasOne(Teacher::class);
      }

    public function assessments(){
      return $this->hasMany(Assessment::class);
    }

    public function grade(){
      return $this->belongsTo(Grade::class);
    }

}
