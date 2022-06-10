<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Student;
use App\Models\Guardian;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\ClassGroup;
use App\Models\Assessment;
use App\Models\Activity;
use App\Models\Lesson;
use App\Models\Level;
use App\Models\Sequence;
use App\Models\Payment;
use DataTables;

class TestController extends Controller
{

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

  public function theTest(Request $request){
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
      'date'=>"2022-06-09",
      'reference_no' =>"0606",
      'description'=>"Fees",
      'currency'=>"USD",
      'act_amount'=>456.75,
      'loc_amount'=>456.75,
      'type'=>0,
      'sponsor_id'=>"TTTTTT",
    ]);



    $students = Student::where("class_group_id","=","1A1")->with('last_payment')->get();

    $good_payments = array();
    $payments = array();



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

    Payment::insert($payments);
    return $payments;

   }
         //}

}
