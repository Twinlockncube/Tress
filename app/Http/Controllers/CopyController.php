<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\models\Copy;
use DB;

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

    public function availability(Request $request){
         $copy_id = $request->get('id');
         $copy = Copy::find($copy_id)===null? null:Copy::where('id','=',$copy_id)->with('book')->first();
         return response()->json($copy);
    }

    public function view(Request $request){
        $id = $request->input('id');
        $copy = Copy::where('id','=',$id)->first();
        return response()->json($copy);
    }

    public function create(Request $request){
      if($request->ajax()){
        $copy_ids = explode('-',$request->get('id'));
        $check_letter = preg_replace('/[^A-Z]/','',strtoupper($copy_ids[0]));
        $min = ltrim(preg_replace('/[^0-9]/','',$copy_ids[0]),'0');
        $max = $min;
        if(count($copy_ids)>1){
          $max = ltrim(preg_replace('/[^0-9]/','',$copy_ids[1]),'0');
        }
        $copies = array();

        $length =4;

        for($i=$min;$i<=$max;$i++){
          $postfix = str_pad($i,$length,"0", STR_PAD_LEFT);
          $id = $check_letter.$postfix;
          $copy = [
            'id'=>$id,
             'book_id'=>$request->get('book_id'),
             'state'=>$request->get('state'),
             'availability'=>$request->get('availability'),
             'location_id'=>$request->get('location_id'),
          ];
          array_push($copies,$copy);
        }

        DB::transaction(function() use ($copies){
          Copy::insert($copies);
        });
        return response()->json($copies);
      }

    }
}
