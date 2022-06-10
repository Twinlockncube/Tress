<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'payment_no',
        'batch_no',
        'date',
        'reference_no',
        'description',
        'currency',
        'act_amount',
        'loc_amount',
        'loc_balance',
        'type',
        'sponsor_id',
        'student_id',
    ];

    public function student(){
      return $this->belongsTo(Student::class);
    }
}
