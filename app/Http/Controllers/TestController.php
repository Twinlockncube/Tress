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
use Carbon\Carbon;

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
    $seq = Sequence::find(1);
    $pay_count = $seq->payment_seq;
    //$id = $request->input('id');
    $id = "22BAT0007";
    $description = $request->input('description');

    $rev_payments = array();

    $batch = Batch::find($id)->payments;
    /*$rev_batch = $batch->replicate();
    $rev_batch->id = $this->batch_no($seq);
    $rev_batch->date = Carbon::now()->toDateTimeString();
    $rev_batch->reference_no = $id;
    $rev_batch->description = $description;
    $rev_batch->sponsor_id =$batch->sponsor_id;
    $rev_batch->type =(int)(!((bool)($batch->type)));
    $rev_batch->user_id=Auth::user()->id;*/

    return $batch;
   }
         //}

}
