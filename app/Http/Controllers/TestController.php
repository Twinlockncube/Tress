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
use DataTables;

class TestController extends Controller
{
  public function theTest(Request $request){
    $header = json_decode(json_encode($request->input('general')));
    return $header;

   }
         //}

}
