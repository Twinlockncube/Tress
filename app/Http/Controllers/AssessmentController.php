<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Assessment;
use DataTables;
use Illuminate\Routing\Route;

class AssessmentController extends Controller
{
  public function index(){
    return view('assessment/index');
  }

  public function validateTotal(Request $request){
    $parent = $request->input('parent');
    $assessment = Assessment::where('id','=',$parent)->withSum('children','perc_weight')->first();
    return response()->json($assessment);
  }

  public function viewAssessment(Request $request){
    $validate =$request->validate(['group'=>'required']);
    $id = $request->input('id');
    if(!empty($request->input('group'))){
      $class_group = strtoupper($request->input('group'));

      $the_assessment = Assessment::find($id);
      if(!($the_assessment) || !($the_assessment->class_group->name===$class_group)){
        return response()->json(['msg'=>'Code Not Found In Class']);
      }
    }
    $assessment = Assessment::where('id','=',$id)->with('subject')->first();
    return response()->json($assessment);
  }

  public function getAssessments(Request $request){
   if ($request->ajax()) {
       $data = Assessment::latest()->with('subject')->with('class_group')->get();
       return Datatables::of($data)
           ->addIndexColumn()
           ->make(true);
         }
       }

  public function assessmentNumber(Subject $subject){
    $length = 4;
    $name = $subject->id;
    $string = $subject->sequence->seq_num + 1;
    $postfix = str_pad($string,$length,"0", STR_PAD_LEFT);
    $prefix = substr(date('Y'),2);
    return strtoupper(substr($name,0,4)).$prefix.$postfix.'AS';
  }


  public function getSubject(Request $request){
    if($request->ajax()){
      $subject_code = $request->input('code');
      $subject = Subject::where('id','=',$subject_code)->first();

      return  json_encode($subject);
    }
  }

  public function create(Request $request){
      if($request->ajax()){

      $subject_id =$request->get('sub');
      $subject = Subject::where('id','=',$subject_id)->first();
      $id =$this->assessmentNumber($subject);
      $title =$request->get('title');
      $description =$request->get('description');
      $class_group_id =$request->get('group');
      $user_id =Auth::user()->id;
      $category =$request->get('category');
      $total =$request->get('total');
      $perc_weight =$request->get('weight');
      $parent_id =$request->get('parent');
      $date =$request->get('date');

      $assessment = new Assessment([
        'id' => $id,
        'title' => $title,
        'description' => $description,
        'subject_id' => $subject_id,
        'class_group_id' => $class_group_id,
        'user_id' => $user_id,
        'category' => $category,
        'total' =>$total,
        'perc_weight' => $perc_weight,
        'parent_id' => $parent_id,
        'date' => $date,
      ]);

      $assessment->save();
      $subject->ass_sequence()->update(['seq_num'=> $subject->ass_sequence->seq_num+1]);
      return response()->json($assessment);
    }
  }
}
