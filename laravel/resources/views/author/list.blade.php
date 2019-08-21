@extends("layout")
@section("main_content")
    <table class="table table-hover">
        <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Active</th>
        </thead>
        <tbody>
        @foreach($authors as $author)
            <tr>
                <td>{{$author->author_id}}</td>
                <td>{{$author->author_name}}</td>
                <td>{{$author->active}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $authors->links("navigation") !!}
@endsection