<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
      'id',
      'title',
      'description',
      'subject_id',
      'class_group_id',
      'user_id',
      'category',
      'total',
      'perc_weight',
      'parent_id',
      'date',
    ];

    public $incrementing = false;

    public function student(){
      return $this->belongsTo(Student::class);
    }

    public function results(){
      return $this->hasMany(Result::class);
    }

    public function children(){
      return $this->hasMany(Assessment::class,'parent_id');
    }

    public function parent(){
      return $this->belongsTo(Assessment::class,'parent_id');
    }

    public function subject(){
      return $this->belongsTo(Subject::class);
    }

    public function class_group(){
      return $this->belongsTo(ClassGroup::class);
    }

}
