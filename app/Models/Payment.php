<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'batch_id',
        'loc_balance',
        'student_id',
    ];
    public $incrementing = false;

    public function student(){
      return $this->belongsTo(Student::class);
    }

    public function batch(){
      $this->belongsTo(Batch::class);
    }
}
