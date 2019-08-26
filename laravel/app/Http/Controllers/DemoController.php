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
        $messages = [
            "required" => "Bắt buộc phải nhập thông tin",
            "string"    => "Phải nhập vào 1 chuỗi",
            "numeric"   => "Phải nhập vào 1 số",
            "min"   => "Giá trị tối thiểu 0 hoặc 6 ký tự",
            "max"   => "Tối đa 255 ký tự",
            "unique" => "Đã tồn tại giá trị này"
        ];

        $rules = [
            "book_name" => "required|string|max:255|unique:book",
            "qty"   => "required|numeric|min:0",
            "author_id"=> "required|numeric",
            "nxb_id"    => "required|numeric"
        ];

        $this->validate($request,$rules,$messages);
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

    public function suasach(Request $request){
        $book_id = $request->get("id");
        $book = Book::find($book_id);
        $authors = Author::orderBy("author_name","ASC")->get();
        $nxbs = Nxb::orderBy("nxb_name","ASC")->get();
        return view("book.form_edit",compact("book",'authors','nxbs'));
    }

    public function capnhatsach(Request $request){
        $book = Book::find($request->get("book_id"));

        $messages = [
            "required" => "Bắt buộc phải nhập thông tin",
            "string"    => "Phải nhập vào 1 chuỗi",
            "numeric"   => "Phải nhập vào 1 số",
            "min"   => "Giá trị tối thiểu 0 hoặc 6 ký tự",
            "max"   => "Tối đa 255 ký tự",
            "unique" => "Đã tồn tại giá trị này"
        ];

        $rules = [
            "book_name" => "required|string|max:255|unique:book,book_name,".$book->book_id.",book_id",
            "qty"   => "required|numeric|min:0",
            "author_id"=> "required|numeric",
            "nxb_id"    => "required|numeric"
        ];

        $this->validate($request,$rules,$messages);

        try{
            $book->update([
                "book_name"=> $request->get("book_name"),
                "author_id"=> $request->get("author_id"),
                "nxb_id"=> $request->get("nxb_id"),
                "qty"=> $request->get("qty"),
            ]);
        }catch (\Exception $e){
            die($e->getMessage());
        }
        return redirect("quan-ly-sach");
    }


    public function xoasach($id){
        $book = Book::find($id);
        try {
            // cach 1
            $book->active = Book::DEACTIVE;
            $book->save();
            // cach 2
            // $book->update("active",Book::DEACTIVE);

            //$book->delete();
        }catch (\Exception $e){
            //die($e->getMessage());
            return redirect("quan-ly-sach")->withErrors(["fail"=>$e->getMessage()]);
        }
        return redirect("quan-ly-sach")->with("success","Delete successfully");

    }
}
