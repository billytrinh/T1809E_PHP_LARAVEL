<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quan ly sach</title>
    <link rel="stylesheet" type="text/css" href="{{asset("bootstrap/css/bootstrap.css")}}"/>
</head>
<body>
    <div class="col-xs-6 col-xs-offset-3">
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
    </div>
</body>
</html>