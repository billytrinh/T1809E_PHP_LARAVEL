@foreach($books as $book)
    <tr>
        <td>{{$book->book_name}}</td>
        <td>{{$book->qty}}</td>
        <td>{{$book->created_at}}</td>
    </tr>
@endforeach