<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
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
                    ->where("book.qty",">=",500) // so sanh >=
                    ->where("book.active",1) // so sanh =
                    ->where("author.author_name",$search_author)
                    //->where("book_name","LIKE","%".$search_key."%")// tim kiem
                    ->orderBy("book.book_name","ASC")
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
}
