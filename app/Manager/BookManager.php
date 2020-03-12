<?php

namespace App\Manager;

use App\Models\Book;
use App\Facades\AuthorManager;
use Illuminate\Http\Request;

/**
 * Class BookManager
 * @package App\Manager
 */
class BookManager
{
    /**
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getListWithoutAuthor()
    {
        return Book::get();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getList()
    {
        return Book::with('authors')->get();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function create()
    {
        return AuthorManager::getListWithoutBooks();
    }

    /**
     * @param Request $request
     * @return Book
     */
    public function store(Request $request)
    {
        $book = new Book();
        $book->title = $request->book_title;
        $book->save();
        if ($request->has('author') && !is_null($request->author)) {
            $book->authors()->create([
                'name' => $request->author,
            ]);
        }
        $book->authors()->syncWithoutDetaching($request->authors);

        return $book;
    }

    /**
     * @param Book $book
     * @return array
     */
    public function show(Book $book)
    {
        $authors = $book->authors;
        $countAuthor = count($authors);

        return ['authors' => $authors, 'countAuthor' => $countAuthor];
    }

    /**
     * @param Book $book
     * @return array
     */
    public function edit(Book $book)
    {
        $authorsBook = $book->authors->pluck('id')->toArray();
        $authorsAll = AuthorManager::getListWithoutBooks();

        return ['authorsBook' => $authorsBook, 'authorsAll' => $authorsAll];
    }

    /**
     * @param Request $request
     * @param Book $book
     * @return Book
     */
    public function update(Request $request, Book $book)
    {
        $book->title = $request->book_title;
        $authorsArray = $request->authors;
        $book->save();
        if ($request->has('author') && !is_null($request->author)) {
            $author = $book->authors()->create([
                'name' => $request->author,
            ]);
            array_push($authorsArray, $author->id);
        }
        $book->authors()->sync($authorsArray);

        return $book;
    }

    /**
     * @param Book $book
     * @throws \Exception
     */
    public function destroy(Book $book)
    {
        $book->delete();
    }
}
