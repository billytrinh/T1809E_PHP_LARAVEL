@extends("layout")
@section("main_content")
    <table class="table table-hover">
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Author</th>
            <th>NXB</th>
            <th>Qty</th>
            <th>Active</th>
        </thead>
        <tbody>
            @foreach($books as $book)
                <tr>
                    <td>{{$book->book_id}}</td>
                    <td>{{$book->book_name}}</td>
                    <td>{{$book->author_id}}</td>
                    <td>{{$book->nxb_id}}</td>
                    <td>{{$book->qty}}</td>
                    <td>{{$book->active}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $books->links("navigation") !!}
@endsection