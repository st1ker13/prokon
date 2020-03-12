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
<form method="post" action="{{route('authors.update', ['author' => $author])}}">
    @csrf
    @method('PUT')
    name author
    <input type="text" value="{{$author->name}}" name="author"> <br><br><br>
    array books
    <select multiple name="book[]">
        @foreach($booksAll as $book)
            @if(in_array($book->id, $booksAuthor))
                <option selected value="{{$book->id}}">{{$book->title}}</option>
            @else
                <option value="{{$book->id}}">{{$book->title}}</option>
            @endif
        @endforeach
    </select> <br><br><br>
    new book
    <input type="text" name="book_title"> <br><br><br>
    <button type="submit">submit</button>
</form>

</body>
</html>
