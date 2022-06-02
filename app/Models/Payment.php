<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'date',
        'reference_no',
        'description',
        'currency',
        'rate',
        'act_amount',
        'loc_amount'
        'loc_balance',
        'sponsor_id',
        'student_id',
    ];
}
