<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'date',
        'reference_no',
        'description',
        'currency',
        'act_amount',
        'act_total',
        'loc_amount',
        'loc_total',
        'sponsor_id',
        'entity_to_bill',
        'type',
        'user_id',
    ];

    public $incrementing = false;

    public function payments(){
      return $this->hasMany(Payment::class);
    }
}
