<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassLesson;
use DataTables;
use Carbon\Carbon;
use Auth;

class ClassLessonController extends Controller
{
  public function index(){
    return view('class_lesson\index');
  }

  public function showClassLesson(Request $request){
    if ($request->ajax()) {
        $data = ClassLesson::latest()->with('lesson')->get();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
              $deleteBtn = ' <button class="btn btn-outline-danger" onClick="deleteClassLesson(event)">
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

 public function create(Request $request){
   $lesson_id = $request->input('lesson_id');
   $class_id = $request->input('class_id');
   $class_lesson = new ClassLesson([
     'class_group_id' => $class_id,
     'lesson_id' => $lesson_id,
     'start_date' => $request->input('start_date'),
     'end_date' => $request->input('end_date'),
     'evaluation' => $request->input('evaluation'),
     'creator' => Auth::user()->id,
     'updater' => Auth::user()->id,
     'created_at' => Carbon::now()->toDateTimeString(),
     'updated_at' => Carbon::now()->toDateTimeString()
   ]);

   $isSaved = ClassLesson::where(
                            ['lesson_id'=>$lesson_id],
                            ['class_id'=>$class_id]
                            )->first();
   if(!($isSaved)){
     $class_lesson->save();
     return response()->json(['msg' => "Class-Lesson Registered Successfully"]);
   }
   else{
     return response()->json(['msg' => "Lesson Already Asssigned To Class"]);
   }

 }

 public function show(Request $request){
   $id = $request->input('id');
   $class_lesson = ClassLesson::where('lesson_id','=',$id)->with(['lesson'=>function($query){
     $query->with('subject');
   }])->first();
   return response()->json($class_lesson);
 }
}
