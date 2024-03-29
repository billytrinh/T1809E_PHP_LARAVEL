@extends("layout")
@section("main_content")
    <a href="{{url("/admin/them-sach")}}" class="au-btn au-btn-icon au-btn--green au-btn--small">Thêm sách</a>
    @if(Session::has("success"))
        <p style="color: green">{{Session::get("success")}}</p>
    @endif
    @if($errors->has("fail"))
        <p style="color: red">{{$errors->first("fail")}}</p>
    @endif

    <div class="table-responsive m-b-40">
        <table class="table table-borderless table-data3">
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Author</th>
            <th>NXB</th>
            <th>Qty</th>
            <th>Active</th>
            <th></th>
            <th></th>
        </thead>
        <tbody>
            @foreach($books as $book)
                <tr>
                    <td>{{$book->book_id}}</td>
                    <td>{{$book->book_name}}</td>
                    <td><a href="{{url("chi-tiet-tac-gia?a_id=".$book->author_id)}}">{{$book->getAuthor->author_name}}</a></td>
                    <td>{{$book->getNxb->nxb_name}}</td>
                    <td>{{$book->qty}}</td>
                    <td>{{\App\Book::$_StatusLabel[$book->active]}}</td>
                    <td><a href="{{url("sua-sach?id=".$book->book_id)}}">Edit</a> </td>
                    <td><a onclick="return confirm('Are you sure?')" href="{{url("xoa-sach/".$book->book_id)}}">Delete</a> </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $books->links("navigation") !!}
    </div>
@endsection