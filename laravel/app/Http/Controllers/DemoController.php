<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\Nxb;
use Illuminate\Http\Request;

class DemoController extends Controller
{

    public function bookList(){
        // Lay tat ca
        //$books = Book::all();
        // Co phan trang
        $search_key = "Care";
        $search_author = "Kaci Metz";
        $books = Book::leftJoin("author","book.author_id",'=',"author.author_id")
                //    ->where("book.qty",">=",500) // so sanh >=
                    ->where("book.active",1) // so sanh =
                  //  ->where("author.author_name",$search_author)
                    //->where("book_name","LIKE","%".$search_key."%")// tim kiem
                    ->orderBy("book.created_at","DESC")
                    ->orderBy("book.qty","DESC")
                    ->paginate(20,["book.book_id","book.book_name","book.qty",
                        "book.active","author.author_name as author_id"]);
        return view("book.list",compact("books"));
    }

    public function authorList(){
        $authors =  Author::orderBy("author_name","ASC")
                    ->paginate(20);
        return view("author.list",compact('authors'));
    }

    public function themsach(){
        $authors = Author::orderBy("author_name","ASC")->get();
        $nxbs = Nxb::orderBy("nxb_name","ASC")->get();
        return view("book.form",compact('authors','nxbs'));
    }

    public function luusach(Request $request){
        $this->validate($request,[
            "book_name" => "required|string|max:255|unique:book",
            "qty"   => "required|numeric|min:0",
            "author_id"=> "required|numeric",
            "nxb_id"    => "required|numeric"
        ]);
        try{
            Book::create([
                "book_name"=> $request->get("book_name"),
                "author_id"=> $request->get("author_id"),
                "nxb_id"=> $request->get("nxb_id"),
                "qty"=> $request->get("qty"),
            ])->save();
        }catch (\Exception $e){
            die($e->getMessage());
        }

        return redirect("/quan-ly-sach");
    }

}
