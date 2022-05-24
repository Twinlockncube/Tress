<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use DataTables;
use App\Models\Lesson;
use App\Models\Attendance;
use Illuminate\Routing\Route;

class AttendanceController extends Controller
{

 public function index()
 {
     return view('attendance/create');
 }

 public function getAttendances(Request $request){
  if ($request->ajax()) {
      //$class_group = Route::current()->parameter('class_group_id');
      $class_group = $request->route('group');
      $lesson_id = $request->route('code');

        $less_attendances = DB::table('attendances')
                          ->where('lesson_id','=',$lesson_id);

         $data = DB::table('students')
                 ->leftJoinSub($less_attendances, 'less_attendances',
                       function($join){
                           $join->on('students.id','=','less_attendances.student_id');
                       })
                 ->where('students.class_group_id','=',$class_group)
                 ->select('students.id','students.name','students.last_name','less_attendances.punctual')
                 ->get();



      return Datatables::of($data)
          ->addIndexColumn()
          ->rawColumns(['selection'])
          ->make(true);
        }
      }

      public function capture(Request $request){

        $lesson_id = $request->input('lesson_id');
        $the_lesson=Lesson::find($lesson_id);
        if($the_lesson){
                $lines = json_decode($request->input('lines'));

              //  $attendances = array();
                foreach ($lines as $line) {
                  $arr_line = json_decode(json_encode($line));
                  $attendance = Attendance::firstOrNew([
                    'lesson_id' => $arr_line->lesson_id,
                    'student_id' => $arr_line->student_id,
                  ]);
                  $attendance->punctual = $arr_line->punctual;
                  $attendance->user_id = Auth::user()->id;
                  $attendance->save();

                }
         return response()->json(['msg'=>'Data Captured Successfully']);
      }

        return response()->json(['msg'=>'Unable to update']);
      }

}
