<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Issue;
use App\Models\Copy;
use App\Models\Sequence;
use DataTables;
use DB;

class IssueController extends Controller
{
  public function index(){
    return view('issue/index');
  }

  public function list(Request $request){
   if ($request->ajax()) {
       $data = Issue::latest()->with('copy',function($query){
         $query->with('book');
       })->with('students')->get();
       return Datatables::of($data)
           ->addIndexColumn()
           ->addColumn('borrower',function(Issue $issue){
             $borrower = "Nill";
             if(count($issue->students)===1){
               $borrower = $issue->students[0]->id;
             }
             else if(count($issue->students)>1){
               $borrower ="Group";
             }
            return $borrower;
           })
           ->make(true);
         }
    }

    public function view(Request $request){
        $id = $request->input('id');
        $issue = Issue::where('id','=',$id)->with('copy',function($query){
          return $query->with('book');
        })->first();
        return response()->json($issue);
    }

    public function issueNumber(Sequence $seq){
      $length = 4;
      $string = $seq->issue_seq + 1;
      $postfix = str_pad($string,$length,"0", STR_PAD_LEFT);
      $prefix = substr(date('Y'),2);
      return $prefix."ISS".$postfix;
    }

    public function create(Request $request){
      if($request->ajax()){
        $students = explode(',',$request->get('students'));
         $seq = Sequence::find(1);
         $copy = Copy::find($request->get('copy_id'));
         $issue = new Issue([
          'id' => $this->issueNumber($seq),
          'copy_id' => $request->get('copy_id'),
          'date' => $request->get('date'),
          'status' => 1,
        ]);

        DB::transaction(function() use ($issue,$students,$seq,$copy){
          $issue->students()->sync($students);
          $seq->update(['issue_seq'=> $seq->issue_seq+1]);
          $copy->update(['availability' => 0]);
        });
        return response()->json($issue);
      }

    }

    public function delete(Request $request){
        $id = $request->input('id');
        $issue = Issue::where('id','=',$id)->first();
        $issue->delete();
        return response()->json(array('msg'=>"Issue Deleted Successfully"));
   }

   public function update(Request $request){
     $id = $request->input('id');
     $students = explode(',',$request->get('students'));
     $issue = Issue::where('id','=',$id)->first();
     $issue->update([
      'date' => $request->get('date'),
    ]);
    $issue->students()->sync($students);
     return response()->json(['msg'=>"Edited Successfully"]);
   }

}
