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
<table border="1">
    <h3><a href="{{route('books.create')}}">create</a></h3>
    @foreach($books as $book)
        <tr>
            <td>{{$book->title}}</td>
            <td>
                @foreach($book->authors as $author)
                    {{$author->name}}
                    <br>
                @endforeach
            </td>
            <td>
                <form method="post" action="{{route('books.destroy', ['book' => $book])}}">
                    @csrf
                    @method('delete')
                    <button type="submit">destroy</button>
                </form>
            </td>
            <td>
                <a href="{{route('books.edit', ['book' => $book])}}">edit</a>
            </td>
        </tr>
    @endforeach
</table>

</body>
</html>
