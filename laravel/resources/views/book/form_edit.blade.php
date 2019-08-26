@extends("layout")

@section("main_content")
    <form action="{{url("/sua-sach")}}" method="post">
        @csrf
        <input type="hidden" name="book_id" value="{{$book->book_id}}">
        <div class="form-group">
            <label>Tên sách</label>
            <input class="form-control" type="text" name="book_name" value="{{$book->book_name}}" placeholder="Tên sách" required>
            @if($errors->has("book_name"))
                <p class="error" style="color:red">{{$errors->first("book_name")}}</p>
            @endif
        </div>
        <div class="form-group">
            <label>Tác gỉa</label>
            <select name="author_id" class="form-control">
                @foreach($authors as $author)
                    <option value="{{$author->author_id}}" @if($author->author_id == $book->author_id)selected @endif>{{$author->author_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Nhà xuất bản</label>
            <select name="nxb_id" class="form-control">
                @foreach($nxbs as $nxb)
                    <option value="{{$nxb->nxb_id}}"  @if($nxb->nxb_id== $book->nxb_id)selected @endif>{{$nxb->nxb_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Số lượng</label>
            <input type="number"  name="qty" value="{{$book->qty}}" class="form-control" placeholder="Số lượng">
            @if($errors->has("qty"))
                <p class="error" style="color:red">{{$errors->first("qty")}}</p>
            @endif
        </div>
        <div class="form-group text-right">
            <button type="submit" class="btn btn-danger">Cập nhật sách</button>
        </div>
    </form>
@endsection