<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

   //protected $table = 'student_test';
   public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'last_name',
        'name',
        'address',
        'dob',
        'gender',
        'email',
        'nid',
        'id',
        'guardian_id',
        'class_group_id',
        'sponsor_id',
    ];

    public function guardian(){
      return $this->belongsTo(Guardian::class);
    }

    public function class_group()
    {
      return $this->belongsTo(ClassGroup::class);
    }

    public function subjects(){
      return $this->hasMany(Subject::class);
    }

    public function results(){
      return $this->hasMany(Result::class);
    }

    public function attendances(){
      return $this->hasMany(Attendance::class);
    }

}
