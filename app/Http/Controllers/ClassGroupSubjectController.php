<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClassGroupSubjectController extends Controller
{
  public function index(){
    return view('class_group_subject\index');
  }

  public function list(Request $request){
    $data = DB::table('class_group_subject')
            ->leftJoin('subjects','class_group_subject.subject_id','subjects.id')
            ->get();

    return Datatables::of($data)
        ->addIndexColumn()
        ->make(true);
  }

  public function create(Request $request){
    $class = $request->get('class_id');
    $subject_str = $request->get('subject_id');
    $subject_list = str_split(',',$subject_str);







  }
}
