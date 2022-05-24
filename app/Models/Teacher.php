<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    /*
    * @var string[]
    */
   protected $fillable = [
       'id',
       'last_name',
       'name',
       'address',
       'gender',
       'email',
       'birth',
       'nid',
       'user_id',
       'class_group_id',
   ];
    public function subjects(){
      return $this->belongsToMany(Subject::class);
    }

}
