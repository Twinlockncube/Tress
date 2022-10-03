<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $fillable = [
      'id',
      'issue_id',
      'date',
    ];

    public function issue(){
      return $this->belongsTo(Issue::class);
    }

}
