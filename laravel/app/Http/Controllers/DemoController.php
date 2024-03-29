<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\Nxb;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Pusher\Pusher;

class DemoController extends Controller
{

    public function bookList(){
        // Lay tat ca
        //$books = Book::all();
        // Co phan trang
        $search_key = "Care";
        $search_author = "Kaci Metz";
        $books = Book::where("active",1) // so sanh =
                  //  ->where("author.author_name",$search_author)
                    //->where("book_name","LIKE","%".$search_key."%")// tim kiem
                    ->orderBy("created_at","DESC")
                    ->orderBy("qty","DESC")
                    ->with("getAuthor")
                    ->paginate(20);
        //dd($books);
        return view("book.list",compact("books"));
    }

    public function authorList(){
        $authors =  Author::orderBy("author_name","ASC")
                    ->withCount("getMyBook")
                    ->paginate(20);
       // dd($authors);
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
            $data = [
                "book_name"=> $request->get("book_name"),
                "author_id"=> $request->get("author_id"),
                "nxb_id"=> $request->get("nxb_id"),
                "qty"=> $request->get("qty"),
                "created_at"=> Carbon::now()
            ];
            sendNotify("my-channel","my-event",$data);

        }catch (\Exception $e){
            die($e->getMessage());
        }

        //return redirect("/admin/quan-ly-sach");
        return adminRedirect("quan-ly-sach");
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
        return redirect(adminPath("quan-ly-sach"));
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
            return redirect(adminPath("quan-ly-sach"))->withErrors(["fail"=>$e->getMessage()]);
        }
        return redirect(adminPath("quan-ly-sach"))->with("success","Delete successfully");

    }

    public function chitiettacgia(Request $request){
        $a_id = $request->get("a_id");
        $author = Author::find($a_id);
        return view("author.detail",compact("author"));
    }
}
