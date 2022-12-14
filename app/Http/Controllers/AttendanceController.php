<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use DataTables;
use App\Models\Subject;
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
      $class_group = $request->get('id');
      $subject_id = $request->get('subject_id');
      $date = $request->get('date');


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



      return Datatables::of($data)
          ->addIndexColumn()
          ->rawColumns(['selection'])
          ->make(true);
        }
      }

      public function capture(Request $request){
        $date = $request->get('date');
        $subject_id = $request->input('subject_id');
        $the_subject=Subject::find($subject_id);
        if($the_subject){
                $lines = json_decode($request->input('lines'));

              //  $attendances = array();
                foreach ($lines as $line) {
                  $arr_line = json_decode(json_encode($line));
                  $attendance = Attendance::firstOrNew([
                    'subject_id' => $arr_line->subject_id,
                    'student_id' => $arr_line->student_id,
                  ]);
                  $attendance->punctual = $arr_line->punctual;
                  $attendance->date = $date;
                  $attendance->user_id = Auth::user()->id;
                  $attendance->save();

                }

      }
        return response()->json(['msg'=>'Register Marked Successfully']);
      }

}
