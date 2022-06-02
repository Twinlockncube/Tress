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
    public function latestRate(){
      return $this->hasOne(Rate::class)->latestOfMany();
    }
}
