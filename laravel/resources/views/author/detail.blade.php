@extends("layout")

@section("main_content")
<h1>{{$author->author_name}}</h1>
<h2>Danh sách các cuốn sách của tác giả</h2>
<div class="table-responsive m-b-40">
    <table class="table table-borderless table-data3">
        <thead>
        <th>ID</th>
        <th>Name</th>
        <th>NXB</th>
        <th>Qty</th>
        <th>Active</th>
        <th></th>
        <th></th>
        </thead>
        <tbody>
        @foreach($author->getMyBook as $book)
            <tr>
                <td>{{$book->book_id}}</td>
                <td>{{$book->book_name}}</td>
                <td>{{$book->getNxb->nxb_name}}</td>
                <td>{{$book->qty}}</td>
                <td>{{\App\Book::$_StatusLabel[$book->active]}}</td>
                <td><a href="{{url("sua-sach?id=".$book->book_id)}}">Edit</a> </td>
                <td><a onclick="return confirm('Are you sure?')" href="{{url("xoa-sach/".$book->book_id)}}">Delete</a> </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection