<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;
    protected $fillable = [
      'id',
      'name',
      'short_code',
      'status',
      'name',
      'status',
    ];
    public $incrementing = false;
    public function latestRate(){
      return $this->hasOne(Rate::class)->latestOfMany();
    }

    public function rate(){
      return $this->hasMany(Rate::class);
    }
}
