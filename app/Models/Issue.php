<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    use HasFactory;
    public $incrementing = false;

    public function students(){
      return $this->belongsToMany(Student::class);
    }

    public function copy(){
      return $this->belongsTo(Copy::class);
    }

}
