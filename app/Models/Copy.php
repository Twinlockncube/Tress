<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Copy extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $fillable = [
      'id',
      'book_id',
      'description',
      'state',
      'availability',
      'location_id',
    ];

    public function book(){
      return $this->belongsTo(Book::class);
    }

    public function issues(){
      return $this->hasMany(Issue::class);
    }

    public function last_issue(){
      return $this->hasMany(Issue::class)->latest();
    }
}
