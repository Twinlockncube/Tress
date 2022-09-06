<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\models\Copy;

class CopyController extends Controller
{
  public function index(){
    return view('copy/index');
  }

  public function list(Request $request){
   if ($request->ajax()) {
       $data = Copy::latest()->with('book')->get();
       return Datatables::of($data)
           ->addIndexColumn()
           ->make(true);
         }
    }
}