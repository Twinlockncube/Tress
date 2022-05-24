<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guardian;
use DataTables;

class GuardianController extends Controller
{

  function __construct()
   {
        $this->middleware('permission:guardian-list|guardian-create|guardian-edit|guardian-delete', ['only' => ['index','show','viewGuardian']]);
        $this->middleware('permission:guardian-create', ['only' => ['index']]);
        $this->middleware('permission:guardian-edit', ['only' => ['updateGuardian']]);
        $this->middleware('permission:guardian-delete', ['only' => ['deleteGuardian']]);
   }

  public function getGuardians(Request $request){
   if ($request->ajax()) {
       $data = Guardian::latest()->get();
       return Datatables::of($data)
           ->addIndexColumn()
           ->addColumn('action', function($row){
             $deleteBtn = ' <button class="btn btn-outline-danger" onClick="deleteGuardian(event)">
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

    public function deleteGuardian(Request $request){
           $id = $request->input('id');
           $guardian = Guardian::where('guardian_id','=',$id)->first();
           $guardian->delete();
           return response()->json(array('msg'=>"Guardian Deleted Successfully"));
      }

      public function viewGuardian(Request $request){
          $id = $request->input('id');
          $guardian = Guardian::where('id','=',$id)->first();
          //$name = "The name: ".$student->name;
          return response()->json($guardian);
      }

}
