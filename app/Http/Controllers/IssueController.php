<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Issue;
use DataTables;

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
}
