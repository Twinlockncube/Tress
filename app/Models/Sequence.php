<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sequence extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'student_seq',
        'payment_seq',
        'payment_batch_seq',
        'sponsor_seq',
        'guardian_seq',
        'receipt_seq',
        'issue_seq',
    ];
}
