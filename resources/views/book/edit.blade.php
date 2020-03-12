<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="post" action="{{route('books.update', ['book' => $book])}}">
    @csrf
    @method('PUT')
    new author
    <input type="text" name="author"> <br><br><br>
    array books
    <select multiple name="authors[]">
        @foreach($authorsAll as $author)
            @if(in_array($author->id, $authorsBook))
                <option selected value="{{$author->id}}">{{$author->name}}</option>
            @else
                <option value="{{$author->id}}">{{$author->name}}</option>
            @endif
        @endforeach
    </select> <br><br><br>
    title book
    <input type="text" value="{{$book->title}}"  name="book_title"> <br><br><br>
    <button type="submit">submit</button>
</form>

</body>
</html>
