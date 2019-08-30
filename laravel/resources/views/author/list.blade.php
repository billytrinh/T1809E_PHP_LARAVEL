@extends("layout")
@section("main_content")
    <div class="table-responsive m-b-40">
    <table class="table table-borderless table-data3">
        <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Book count</th>
        <th>Active</th>
        </thead>
        <tbody>
        @foreach($authors as $author)
            <tr>
                <td>{{$author->author_id}}</td>
                <td>{{$author->author_name}}</td>
                <td>{{$author->get_my_book_count}}</td>
                <td>{{$author->active}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $authors->links("navigation") !!}
    </div>
@endsection