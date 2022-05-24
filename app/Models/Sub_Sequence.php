<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sub_Sequence extends Model
{
    use HasFactory;
    protected $fillable = [
        'subject_id',
        'seq_num',
        'less_num',
    ];
}
