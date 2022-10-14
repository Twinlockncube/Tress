<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
  public function existence(Request $request){
       $sub_id = $request->get('id');
       $sub = Subject::find($sub_id)===null? null:Subject::where('id','=',$sub_id)->first();
       return response()->json($sub);
  }
}
