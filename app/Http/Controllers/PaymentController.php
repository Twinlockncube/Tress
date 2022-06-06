<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use Auth;
use DataTables;

class PaymentController extends Controller
{

  public function index(){
    return view('payment\index');
  }

    public function create(Request $request){
      $payment = new Payment([
        'date'=>$request->input('date'),
        'reference_no' =>$request->input('reference_no'),
        'description'=>$request->input('description'),
        'currency'=>$request->input('currency'),
        'rate'=>$request->input('rate'),
        'act_amount'=>$request->input('act_amount'),
        'loc_amount'=>$request->input('loc_amount'),
        'sponsor_id'=>$request->input('sponsor_id'),
      ]);

      $students = null;
      if($request->input('criterion')===0){
        $students = Student::where('class_id','=',$class_id)->get();
      }
      else if($request->input('criterion')===1){
        $students = Student::where('level_id','=',$level_id)->get();
      }
      else{
        $students = Student::all()->get();
      }

      foreach($students as $student){
        $balance = ($student->payments()===null)? $payment->amount: $student->payments()->latest()->loc_balance - $payment->loc_amount;
        $stu_payment = $payment;
        $stu_payment->loc_balance = $balance;
        $stu_payment->student_id = $student->id;
        $stu_payment->save();
      }

      return response()->json(["msg"=>"Payments Captured Successfully"]);
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
