<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Receipt;
use App\Models\Sequence;
use App\Models\Issue;
use DataTables;
use DB;
class ReceiptController extends Controller
{
  public function index(){
    return view('receipt/index');
  }

  public function list(Request $request){
   if ($request->ajax()) {
       $data = Receipt::latest()->get();
       return Datatables::of($data)
           ->addIndexColumn()
           ->make(true);
         }
    }


    public function recNum(Sequence $seq){
      $length = 4;
      $string = $seq->receipt_seq + 1;
      $postfix = str_pad($string,$length,"0", STR_PAD_LEFT);
      $prefix = substr(date('Y'),2);
      return "REC".$prefix.$postfix;
    }
    public function create(Request $request){
      if($request->ajax()){
        $location = $request->get('location');
         $seq = Sequence::find(1);
         $receipt = new Receipt([
          'id' => $this->recNum($seq),
          'issue_id' => $request->get('issue_id'),
          'date' => $request->get('date'),
        ]);

        $issue = Issue::find($request->get('issue_id'));
        if($issue===null){
          return response()->json(['error'=>'Issue '.$request->get('issue_id').' does not exist']);
        }
        if($issue->status==1){
          return response()->json(['error'=>'Issue '.$request->get('issue_id').' already returned']);
        }
        $copy = $issue->copy;
        DB::transaction(function() use ($receipt,$seq,$issue,$copy,$location){
          $issue->update(['status'=> 1]);
          $copy->update(['availability' => 1,'location_id'=> $location]);
          $seq->update(['receipt_seq'=> $seq->receipt_seq+1]);
          $receipt->save();
        });
        return response()->json($receipt);
      }

    }

    public function view(Request $request){
        $id = $request->input('id');
        $receipt = Receipt::where('id','=',$id)->with('issue',function($query){
          return $query->with('copy',function($copy){
            return $copy->with('book');
          });
        })->first();
        return response()->json($receipt);
    }
}
