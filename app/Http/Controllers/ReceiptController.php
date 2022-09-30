<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Receipt;
use App\Models\Sequence;
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
      //if($request->ajax()){
         $seq = Sequence::find(1);
         $receipt = new Receipt([
          'id' => $this->recNum($seq),
          'issue_id' => $request->get('issue_id'),
          'date' => $request->get('date'),
        ]);
        DB::transaction(function() use ($receipt,$seq){
          $seq->update(['receipt_seq'=> $seq->receipt_seq+1]);
          $receipt->save();
        });
        return response()->json($seq);
      //}

    }
}
