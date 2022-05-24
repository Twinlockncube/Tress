<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
    use HasFactory;

    /* The attributes that are mass assignable.
    *
    * @var string[]
    */
  public $incrementing =false;
   protected $fillable = [
       'id',
       'last_name',
       'name',
       'address',
       'email',
       'gender',
       'contact_no',
       'sid',
       'nid',
   ];

   public function students()
   {
     return $this->hasMany(Student::class);
   }

}
