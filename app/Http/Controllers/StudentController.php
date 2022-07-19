<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Sequence;
use DataTables;
use Auth;

class StudentController extends Controller
{
  function __construct()
   {
        $this->middleware('permission:student-list|student-create|student-edit|student-delete', ['only' => ['index','show']]);
        $this->middleware('permission:student-create', ['only' => ['index','store']]);
        $this->middleware('permission:student-edit', ['only' => ['updateStudent']]);
        $this->middleware('permission:student-delete', ['only' => ['deleteStudent']]);
   }

  public function studentNumber(Sequence $seq){
    $length = 4;
    $string = $seq->student_seq + 1;
    $postfix = str_pad($string,$length,"0", STR_PAD_LEFT);
    $prefix = substr(date('Y'),2);
    return "T".$prefix.$postfix;
  }

   public function index(Request $request){
     //if($request->ajax()){
        $seq = Sequence::find(1);
        $student = new Student([
         'last_name' => $request->get('last_name'),
         'name' => $request->get('name'),
         'address' => $request->get('address'),
         'dob' => $request->get('dob'),
         'gender' => $request->get('gender'),
         'email' => $request->get('email'),
         'birth' => $request->get('birth'),
         'nid' => $request->get('nid'),
         'id' => $this->studentNumber($seq),
         'sponsor_id' => $request->get('sponsor_id'),
         'class_group_id' => $request->get('class_group'),
       ]);
       $student->save();
       $seq->update(['student_seq'=> $seq->student_seq+1]);
       return response()->json($student);
     //}

   }

   public function getStudents(Request $request){
    if ($request->ajax()) {
        $data = Student::latest()->get();
        return Datatables::of($data)
            ->addIndexColumn()
            ->make(true);
          }
        }

    public function viewStudent(Request $request){
        $id = $request->input('id');
        $student = Student::where('id','=',$id)->first();
        //$name = "The name: ".$student->name;
        return response()->json($student);
    }

    public function deleteStudent(Request $request){
        $id = $request->input('id');
        $student = Student::where('id','=',$id)->first();
        $student->delete();
        return response()->json(array('msg'=>"Student Deleted Successfully"));
   }

   public function updateStudent(Request $request){
     $sid = $request->input('sid');
     $student = Student::where('id','=',$sid)->first();
     $student->update([
       'last_name' => $request->get('last_name'),
       'name' => $request->get('name'),
       'address' => $request->get('address'),
       'dob' => $request->get('dob'),
       'gender' => $request->get('gender'),
       'email' => $request->get('email'),
       'birth' => $request->get('birth'),
       'nid' => $request->get('nid'),
       'sponsor_id' => $request->get('sponsor_id'),
       'guardian_id' => $request->get('guardian_id'),
     ]);

     return response()->json(['msg'=>"Edited Successfully"]);
   }

}
