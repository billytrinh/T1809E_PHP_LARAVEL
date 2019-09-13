<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    const _LIMIT = 10;

    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $books = Book::orderBy("created_at","DESC")->take(self::_LIMIT)->get();
        return view('home',compact("books"));
    }

    public function loadMore(Request $request){
        $page = $request->has("page")?$request->get("page"):1;
        $offset = ($page-1)*self::_LIMIT;
        $books = Book::orderBy("created_at","DESC")
                    ->offset($offset)
                    ->take(self::_LIMIT)->get();
        return response()->json($books);
    }

    public function loadMoreHtml(Request $request){
        $page = $request->has("page")?$request->get("page"):1;
        $offset = ($page-1)*self::_LIMIT;
        $books = Book::orderBy("created_at","DESC")
            ->offset($offset)
            ->take(self::_LIMIT)->get();
        return view('book.loadmore',compact("books"));
    }
}
