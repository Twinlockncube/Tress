<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Student;
use App\Models\Guardian;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\ClassGroup;
use App\Models\Assessment;
use App\Models\Activity;
use App\Models\Lesson;
use App\Models\Level;
use App\Models\Sequence;
use App\Models\Payment;
use App\Models\Currency;
use App\Models\Batch;
use App\Models\Copy;
use App\Models\Issue;
use Auth;
use DataTables;
use Carbon\Carbon;

class TestController extends Controller
{
  public function theTest(Request $request){

    $class_group = '1A1';
    $subject_id = 'MAT101';
    $date = '2022-11-15';

      $less_attendances = DB::table('attendances')
                        ->where('subject_id','=',$subject_id)
                        ->where('date','=',$date);

       $data = DB::table('students')
               ->leftJoinSub($less_attendances, 'less_attendances',
                     function($join){
                         $join->on('students.id','=','less_attendances.student_id');
                     })
               ->where('students.class_group_id','=',$class_group)
               ->select('students.id','students.name','students.last_name','less_attendances.punctual')
               ->get();
        return $data;

       }


}
