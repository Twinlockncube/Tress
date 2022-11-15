<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Validator;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Assessment;
use App\Models\Result;
use DataTables;
use Illuminate\Routing\Route;

class ResultController extends Controller
{
  public function index(){
    return view('result/capture');
  }

  public function viewAssessment(Request $request){
    //$validate =$request->validate(['group'=>'required']);
    $validate = Validator::make($request->all(),
    [
      'group'=>[
        'bail',
        'required',
        'exists:class_groups,id'
        ],
      'id'=>[
        'bail',
        'required',
        'exists:assessments,id'
      ]
    ],
    $messages = [
      'id.required' =>'Assessment code is required'
    ]
    )->validate();

    $id = $request->input('id');
      $class_group = strtoupper($request->input('group'));
      $the_assessment = Assessment::find($id);
      $assessment = Assessment::where('id','=',$id)->with('subject')->first();
      return response()->json($assessment);
  }

  public function getResults(Request $request){
   if ($request->ajax()) {
       $class_group = $request->route('group');
       $ass_id = $request->route('code');
       $the_assessment=Assessment::find($ass_id);

       $assessments = $the_assessment->children()->select('id')->get();
       if(count($assessments)>0){
         $results = DB::table('results')
                        ->whereIn('assessment_id',$assessments);

                    $data = DB::table('students')
                            ->leftJoinSub($results, 'results',
                                  function($join){
                                      $join->on('students.id','=','results.student_id');
                                  })
                             ->leftJoin('assessments', 'results.assessment_id', '=', 'assessments.id')
                             ->where('students.class_group_id','=',$class_group)
                             ->select(DB::raw('students.id,students.name,students.last_name,sum(results.score*assessments.perc_weight/assessments.total) AS score'))
                             ->groupBy('students.id','students.name','students.last_name')
                             ->orderBy('score','DESC')
                             ->get();

       }
       else{
         $ass_results = DB::table('results')
                           ->where('assessment_id','=',$ass_id);

          $data = DB::table('students')
                  ->leftJoinSub($ass_results, 'ass_results',
                        function($join){
                            $join->on('students.id','=','ass_results.student_id');
                        })
                  ->where('students.class_group_id','=',$class_group)
                  ->select('students.id','students.name','students.last_name','ass_results.score')
                  ->orderBy('ass_results.score','DESC')
                  ->get();
       }


       return Datatables::of($data)
           ->addIndexColumn()
           ->addColumn('selection', function($row){
               $actionTxt = '<input  type="checkbox" id="marker">';
               return $actionTxt;
           })
           ->rawColumns(['selection'])
           ->make(true);
         }
       }


     public function create(Request $request){

       $ass_id = $request->input('ass_code');
       $the_assessment=Assessment::find($ass_id);
       $assessments = $the_assessment->children()->select('id')->get();
       $validate = Validator::make($request->all(),
        [
          'ass_code' => ['exists:assessments,id',
          function ($attribute, $value, $fail) use($assessments){
            if(count($assessments)){
              $fail('Cannot directly update parent assessment');
            }
          }
        ]
        ]
         )->validate();

               $lines = json_decode($request->input('lines'));

               //$results = array();
               foreach ($lines as $line) {
                 $arr_line = json_decode(json_encode($line));
                 $result = Result::firstOrNew([
                   'assessment_id' => $arr_line->assessment_id,
                   'student_id' => $arr_line->student_id,
                 ]);
                 $result->score = $arr_line->score;
                 $result->save();

               }
        return response()->json(['msg'=>'Data Captured Successfully']);


     }
}
