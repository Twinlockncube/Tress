<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'description',
        'address',
        'country',
        'email',
        'contact',
    ];

    public function students(){
      return $this->hasMany(Student::class);
    }

    public function payments(){
      return $this->hasMany(Payment::class);
    }
}
