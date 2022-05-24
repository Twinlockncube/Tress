<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    /*
    * @var string[]
    */
  public $incrementing = false;
   protected $fillable = [
       'id',
       'name',
       'description',
   ];

    public function teachers(){
      return $this->belongsToMany(Teacher::class);
    }

    public function class_groups(){
      return $this->belongsToMany(ClassGroup::class);
    }

    public function assessments(){
      return $this->hasMany(Assessment::class);
    }

    public function sequence(){
      return $this->hasOne(Sub_Sequence::class);
    }

    public function lessons(){
      return $this->hasMany(Lesson::class);
    }
}
