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
use App\Models\Currency;
use App\Models\Batch;
use Auth;
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
    $sponsor_id = "XXXXXXX";
    $seq = Sequence::find(1);
    $pay_count = $seq->payment_seq;
    $rate = Currency::find('USD')->latestRate->value;
    $loc_amount = $rate * 10.00;

    if(!($request->input('type')===null)){
      $sponsor_id = "SYSTEM";
      $type = 0;
    }

    $payment = new Payment([

    ]);

    $batch = new Batch([
      'id'=>$this->batch_no($seq),
      'date'=>"2020-09-10",
      'reference_no' =>"07865",
      'description'=>"Hello wprld",
      'currency'=>"USD",
      'act_amount'=>10.00,
      'loc_amount'=>$loc_amount,
      'type'=>$type,
      'sponsor_id'=>$sponsor_id,
      'entity_to_bill' =>2,
      'user_id'=>Auth::user()->id,
    ]);

    $students = null;
    $payments = array();

    $students = Student::where("class_group_id","=","1A1")->with('last_payment')->get();


    foreach($students as $student){
      $payment = $payment->replicate();
      $curr_balance = ($student->last_payment===null)?0:$student->last_payment->loc_balance;
      $balance = ($type==1)?$curr_balance+$loc_amount:$curr_balance-$loc_amount;
      $payment->loc_balance = $balance;
      $payment->id = $this->payment_no(strval(++$pay_count));
      $payment->student_id = $student->id;
      $payment->batch_id = $batch->id;
      return $payment;
      array_push($payments,json_decode(json_encode($payment),true));
      break;
    }

    return $batch;
   }
         //}

}
