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
    <h3><a href="{{route('authors.create')}}">create</a></h3>
    @foreach($authors as $author)
        <tr>
            <td>{{$author->name}}</td>
            <td>{{$author->books->count()}}</td>
            <td>
                <form method="post" action="{{route('authors.destroy', ['author' => $author])}}">
                    @csrf
                    @method('delete')
                    <button type="submit">destroy</button>
                </form>
            </td>
            <td>
                <a href="{{route('authors.edit', ['author' => $author])}}">edit</a>
            </td>
        </tr>
    @endforeach
</table>

</body>
</html>
