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
   $last_issue = Copy::find('ETF01')->last_issue()->with('students')->get();
   $last_issue = $last_issue[0];

   $copy = Copy::where('id','=','ETF01')->with('book')->get();
   return $copy;

   }
         //}

}
