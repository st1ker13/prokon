<?php

namespace App\Api\Manager;

use App\Models\Book;
use Illuminate\Http\Request;

/**
 * Class BookManager
 * @package App\Api\Manager
 */
class BookManager
{
    /**
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     * @throws \App\Api\Exceptions\RequestArgumentsException
     */
    public function getList()
    {
        $books = Book::with('authors')->get();

        ResultManager::checkRequestArguments($books);

        return $books;
    }

    /**
     * @param int $book
     * @return Book
     * @throws \App\Api\Exceptions\RequestArgumentsException
     */
    public function show(int $book)
    {
        $book = Book::find($book);

        ResultManager::checkFoundObject($book);

        return $book;
    }

    /**
     * @param Request $request
     * @param int $book
     * @return Book
     * @throws \App\Api\Exceptions\RequestArgumentsException
     */
    public function update(Request $request, int $book)
    {
        $book = Book::find($book);

        ResultManager::checkFoundObject($book);

        $authorsArray = $request->authors ? $request->authors : [];
        $book->update([
            'title' => $request->book_title,
        ]);
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
     * @param int $book
     * @return array
     * @throws \App\Api\Exceptions\RequestArgumentsException
     */
    public function destroy(int $book)
    {
        $book = Book::find($book);

        ResultManager::checkFoundObject($book);

        $book->delete();
        $message = ['message' => 'Книга удалена.'];

        return $message;
    }
}
