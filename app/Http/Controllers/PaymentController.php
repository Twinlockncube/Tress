<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Level;
use App\Models\Sequence;
use App\Models\Student;
use App\Models\ClassGroup;
use Auth;
use DataTables;

class PaymentController extends Controller
{

  public function index(){
    return view('payment\index');
  }

  public function payment_no($string){
    $length = 4;
    $postfix = str_pad($string,$length,"0", STR_PAD_LEFT);
    $prefix = substr(date('Y'),2);
    return $prefix."PAY".$postfix;
  }

  public function batch_no(Sequence $seq){
    $length = 4;
    $string = $seq->payment_batch_seq + 1;
    $postfix = str_pad($string,$length,"0", STR_PAD_LEFT);
    $prefix = substr(date('Y'),2);
    return $prefix."BAT".$postfix;
  }

    public function create(Request $request){
      $type = 1;
      $sponsor_id = $request->input('sponsor_id');
      $seq = Sequence::find(1);
      $pay_count = $seq->payment_seq;

      if(!($request->input('type')===null)){
        $sponsor_id = "SYSTEM";
        $type = 0;
      }
      $payment = new Payment([
        'batch_no'=>$this->batch_no($seq),
        'date'=>$request->input('date'),
        'reference_no' =>$request->input('reference_no'),
        'description'=>$request->input('description'),
        'currency'=>$request->input('currency'),
        'act_amount'=>$request->input('amount'),
        'loc_amount'=>$request->input('amount'),
        'type'=>$type,
        'sponsor_id'=>$sponsor_id,
      ]);

      $students = null;
      $payments = array();

      if($request->input('entity_to_bill')==0){
        return;
      }
      else if($request->input('entity_to_bill')==1){
        $students = Student::where('id','<>',null)->with('last_payment')->get();;
      }
      else if($request->input('entity_to_bill')==2){
        $level = Level::find($request->input('entity_name'));
        $students = $level->students()->with('last_payment')->get();
      }
      else if($request->input('entity_to_bill')==3){
        $students = Student::where("class_group_id","=",$request->input('entity_name'))->with('last_payment')->get();
      }
      else{
        $student = Student::find($request->input('entity_name'));
        array_push($students,$student);
      }

      foreach($students as $student){
        $payment = $payment->replicate();
        $curr_balance = ($student->last_payment===null)?0:$student->last_payment->loc_balance;
        $balance = ($type==1)?$curr_balance+$payment->loc_amount:$curr_balance-$payment->loc_amount;
        $payment->loc_balance = $balance;
        $payment->payment_no = $this->payment_no(strval(++$pay_count));
        $payment->student_id = $student->id;//student()->associate($student);
        $proxy = $payment;
        array_push($payments,json_decode(json_encode($payment),true));

      }

      if(Payment::insert($payments)){
        $seq->update(['payment_seq'=>$pay_count,'payment_batch_seq'=>$seq->payment_batch_seq + 1]);
        return response()->json($payments[0]);
      }

    }

    public function expenseList(Request $request){
      if ($request->ajax()) {
          $data = Payment::where('type','=',0)->latest()->get();
          return Datatables::of($data)
              ->addIndexColumn()
              ->addColumn('action', function($row){
                $deleteBtn = ' <button class="btn btn-outline-danger" onClick="deleteExpense(event)">
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

    public function view(Request $request){

    }
}
