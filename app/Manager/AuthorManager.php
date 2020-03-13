<?php

namespace App\Manager;

use App\Facades\BookManager;
use App\Models\Author;
use Illuminate\Http\Request;

/**
 * Class AuthorManager
 * @package App\Manager
 */
class AuthorManager
{
    /**
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getListWithoutBooks()
    {
        return Author::get();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getList()
    {
        return Author::with('books')->get();
    }

    /**
     * @param Request $request
     * @return Author
     */
    public function store(Request $request)
    {
        $author = new Author;
        $author->name = $request->author;
        $author->save();
        if ($request->has('book_title') && !is_null($request->book_title)) {
            $author->books()->create([
                'title' => $request->book_title,
            ]);
        }
        $author->books()->syncWithoutDetaching($request->book);

        return $author;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function create()
    {
        return BookManager::getListWithoutAuthor();
    }

    /**
     * @param Author $author
     * @return array
     */
    public function show(Author $author)
    {
        $books = $author->books;
        $countBook = count($books);

        return ['books' => $books, 'countBook' => $countBook];
    }

    /**
     * @param Author $author
     * @return array
     */
    public function edit(Author $author)
    {
        $booksAuthor = $author->books->pluck('id')->toArray();
        $booksAll = BookManager::getListWithoutAuthor();

        return ['booksAuthor' => $booksAuthor, 'booksAll' => $booksAll];
    }

    /**
     * @param Request $request
     * @param Author $author
     * @return Author
     */
    public function update(Request $request, Author $author)
    {
        $author->name = $request->author;
        $booksArray = $request->book ? $request->book : [];
        $author->save();
        if ($request->has('book_title') && !is_null($request->book_title)) {
            $book = $author->books()->create([
                'title' => $request->book_title,
            ]);
            array_push($booksArray, $book->id);
        }
        $author->books()->sync($booksArray);

        return $author;
    }

    /**
     * @param Author $author
     * @throws \Exception
     */
    public function destroy(Author $author)
    {
        $author->delete();
    }
}
