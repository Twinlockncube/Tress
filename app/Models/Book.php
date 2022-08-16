<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $fillable = [
                'id',
                'author',
                'title',
                'edition',
                'subject_id',
                'worth',
                'currency_id',
                'category',
              ];
    public function copies(){
      return $this->hasMany(Copy::class);
    }

    public function issues(){
      return $this->hasManyThrough(Issue::class,Copy::class);
    }
}
