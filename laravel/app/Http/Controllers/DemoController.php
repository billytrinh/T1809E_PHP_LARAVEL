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
        $books = Book::orderBy("book_name","ASC")
                    ->orderBy("qty","DESC")
                    ->paginate(20);
        return view("book.list",compact("books"));
    }

    public function authorList(){
        $authors =  Author::orderBy("author_name","ASC")
                    ->paginate(20);
        return view("author.list",compact('authors'));
    }
}
