<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use DataTables;
use Auth;

class BookController extends Controller
{
  public function index(){
    return view('book/index');
  }

  public function getBooks(Request $request){
   if ($request->ajax()) {
       $data = Book::latest()->get();
       return Datatables::of($data)
           ->addIndexColumn()
           ->make(true);
         }
    }

    public function create(Request $request){
      if($request->ajax()){
         //$seq = Sequence::find(1);
         $book = new Book([
          'id' => $request->get('id'),
          'author' => $request->get('author'),
          'title' => $request->get('title'),
          'edition' => $request->get('edition'),
          'subject_id' => $request->get('subject'),
          'worth' => $request->get('worth'),
          'currency_id' =>$request->get('currency'),
          'category' => $request->get('category'),
        ]);
        $book->save();
        //$seq->update(['student_seq'=> $seq->student_seq+1]);
        return response()->json($book);
      }

    }

    public function delete(Request $request){
        $id = $request->input('id');
        $book = Book::where('id','=',$id)->first();
        $book->delete();
        return response()->json(array('msg'=>"Book Deleted Successfully"));
   }

    public function view(Request $request){
        $id = $request->input('id');
        $book = Book::where('id','=',$id)->first();
        return response()->json($book);
    }

    public function update(Request $request){
      $id = $request->input('id');
      $book = Book::where('id','=',$id)->first();
      $book->update([
       'author' => $request->get('author'),
       'title' => $request->get('title'),
       'edition' => $request->get('edition'),
       'subject_id' => $request->get('subject'),
       'worth' => $request->get('worth'),
       'currency_id' =>$request->get('currency'),
       'category' => $request->get('category'),
     ]);

      return response()->json(['msg'=>"Book Edited Successfully"]);
    }
}
