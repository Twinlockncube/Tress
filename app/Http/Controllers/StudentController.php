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
         'sid' => $this->studentNumber($seq),
         'sponsor_id' => $request->get('sponsor_id'),
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
            ->addColumn('action', function($row){
              $deleteBtn = ' <button class="btn btn-outline-danger" onClick="deleteStudent(event)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                            </svg>
                            </button>';

                return $deleteBtn;
            })
            ->rawColumns(['action'])
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
