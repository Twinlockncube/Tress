<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Assessment;
use DataTables;
use Validator;
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
    $string = $subject->assessment_seq + 1;
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

  public function validator($request){
    $validate = Validator::make($request->all(),
    [
      'sub' => [
          'bail',
          'required',
          'exists:subjects,id'
      ],
      'title' => [
         'bail',
         'required',
      ],
      'description' => [],
      'group' => [
        'bail',
        'required',
        'exists:class_groups,id'
      ],
      'category' => [
        'bail',
        'required',
      ],
      'total' => [
        'bail',
        'required',
      ],
      'weight' => [
        function($attribute, $value, $fail) use ($request){
          if($request->get('parent')){
            if(!($value)){
              $fail('Assessment weight is required');
            }
          }
        }
      ],
      'parent' => [
        function($attribute, $value, $fail) use ($request){
          $parent = Assessment::where('id','=',$value)->withSum('children','perc_weight')->first();
          if($value){
            if($parent->parent_id){
              $fail('A child assessment cannot be a parent');
            }
            if($parent->children_sum_perc_weight+$request->get('weight')>100){
              $fail('Total percentage weight cannot exceed 100');
            }
            if(!($parent->class_group_id==$request->get('group'))){
              $fail('Parent and child must belong to same class group');
            }
            if(!($parent->subject_id==$request->get('sub'))){
              $fail('Parent and child must belong to same subject');
            }
           }
        }
      ],
      'date' => [
        'required',

      ],
    ])->validate();
    return $validate;
  }

  public function create(Request $request){
      if($request->ajax()){

      $validate = $this->validator($request);

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

      DB::transaction(function() use ($assessment,$subject){
        $assessment->save();
        $subject->update(['assessment_seq'=> $subject->assessment_seq+1]);
      });
      return response()->json($assessment);
    }
  }

  public function update(Request $request){
    $validate = $this->validator($request);

    $subject_id =$request->get('sub');
    $subject = Subject::where('id','=',$subject_id)->first();
    $id =$request->get('id');
    $title =$request->get('title');
    $description =$request->get('description');
    $class_group_id =$request->get('group');
    $user_id =Auth::user()->id;
    $category =$request->get('category');
    $total =$request->get('total');
    $perc_weight =$request->get('weight');
    $parent_id =$request->get('parent');
    $date =$request->get('date');

    $assessment = Assessment::find($id);
    $assessment->update([
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

    return response()->json($assessment);
  }

  public function delete(Request $request){
      $id = $request->input('id');
      $assessment = Assessment::where('id','=',$id)->first();
      $assessment->delete();
      return response()->json(array('message'=>"Assessment Deleted Successfully"));
 }
}
