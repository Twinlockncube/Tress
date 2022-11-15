<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\Objective;
use App\Models\Activity;
use App\Models\Subject;
use Auth;
use DataTables;

class LessonController extends Controller
{
    public function index(){
      return view('lesson\create');
    }

    public function getLessons(Request $request){
     if ($request->ajax()) {
         $data = Lesson::latest()->get();
         return Datatables::of($data)
             ->addIndexColumn()
             ->addColumn('action', function($row){
               $deleteBtn = ' <button class="btn btn-outline-danger" onClick="deleteLesson(event)">
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

    public function viewLesson(Request $request){
      $id = $request->input('id');
      if(!empty($request->input('group'))){
        $class_group = $request->input('group');

        $the_lesson = Lesson::find($id);
        $less_groups = array();
        if(!($the_lesson)){
          return response()->json(['msg'=>'Lesson Not Found In Class']);
        }
      /*  else{
          foreach ($the_lesson->class_groups as $group) {
            array_push($less_groups,$group->id);
          }

          if(!(in_array($class_group,$less_groups))){
            return response()->json(['msg'=>'Lesson Not Found In Class']);
          }
        }*/
      }
      $lesson = Lesson::where('id','=',$id)->with('subject')->first();
      return response()->json($lesson);
    }

    public function showLesson(Request $request){
      $id = $request->input('id');
      $lesson = Lesson::where('id','=',$id)->with('objectives','activities')->first();
      return response()->json($lesson);
    }

    public function lessonNumber(Subject $subject){
      $length = 4;
      $name = $subject->id;
      $string = $subject->sequence->less_num + 1;
      $postfix = str_pad($string,$length,"0", STR_PAD_LEFT);
      $prefix = "LE".substr(date('Y'),2);
      return strtoupper(substr($name,0,4)).$prefix.$postfix;
    }

    public function create(Request $request){
      $objectives = $request->get('objectives');
      $activities = $request->get('activities');

      $subject_id = $request->input('subject_id');
      $subject = Subject::where('id','=',$subject_id)->first();
      $lesson = new Lesson([
          'id' => $this->lessonNumber($subject),
          'title' => $request->input('title'),
          'subject_id' => $subject_id,
          'aim' => $request->input('aim'),
          'updater' => Auth::user()->id,
          'creator' => Auth::user()->id,
      ]);

      $lesson_saved = $lesson->save();

      foreach ($objectives as $obj_line) {
        $obj_line = json_decode(json_encode($obj_line));
        $objective = new Objective([
          'description' => $obj_line,
        ]);
        $objective->lesson()->associate($lesson);
        $objective->save();

      }

      foreach ($activities as $act_line) {
        $act_line = json_decode(json_encode($act_line));
        $activity = new Activity([
          'description' => $act_line,
        ]);
        $activity->lesson()->associate($lesson);
        $activity->save();

      }

        return response()->json($lesson);
    }

    public function delete(Request $request){
        $id = $request->input('id');
        $lesson = Lesson::where('id','=',$id)->first();
        $lesson->delete();
        return response()->json(array('msg'=>"Class Lesson Deleted Successfully"));
      }
}
