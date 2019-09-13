@extends('layouts.app')

@section('content')
<script src="https://js.pusher.com/5.0/pusher.min.js"></script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Sách mới</div>
                <div class="card-body">
                   <table class="table">
                       <tbody>
                            @foreach($books as $book)
                                <tr>
                                    <td>{{$book->book_name}}</td>
                                    <td>{{$book->qty}}</td>
                                    <td>{{$book->created_at}}</td>
                                </tr>
                            @endforeach
                       </tbody>
                   </table>
                    <a onclick="LoadMore2()" class="btn btn-danger">Load More </a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var page =1;
    function LoadMore() {
        $.ajax({
           url: '{{url('/load-more')}}',
           data: {
               page: ++page,
           },
           method: 'GET',
           success: function (result) {
                var new_html = '';
                for(var i=0;i<result.length;i++){
                    new_html +=  "<tr>" ;
                    new_html +=    "<td>"+result[i].book_name;
                    new_html +=    "</td><td>"+result[i].qty;
                    new_html +=    "</td><td>"+result[i].created_at;
                    new_html +=    "</td></tr>";
                }
               $(".table tbody").append(new_html);
           }
        });
    }

    function LoadMore2() {
        $.ajax({
            url: '{{url('/load-more-html')}}',
            data: {
                page: ++page,
            },
            method: 'GET',
            success: function (result) {
                $(".table tbody").append(result);
            }
        });
    }


    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('6c3775f766196d272451', {
        cluster: 'ap1',
        forceTLS: true
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
        var new_book = "<tr>" +
                       "<td>"+data.book_name+
                       "</td><td>"+data.qty+
                       "</td><td>"+data.created_at+
                       "</td></tr>";
        $(".table tbody").prepend(new_book);
    });
</script>
@endsection
