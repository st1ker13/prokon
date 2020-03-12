<?php

namespace App\Http\Controllers\Book;

use App\Facades\BookManager;
use App\Http\Controllers\Controller;
use App\Http\Requests\Books\StoreBook;
use App\Http\Requests\Books\UpdateBook;
use App\Models\Book;

/**
 * Class IndexController
 * @package App\Http\Controllers\Book
 */
class IndexController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $books = BookManager::getList();

        return view('book.index', compact('books'));
    }

    /**
     * @param StoreBook $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreBook $request)
    {
        $book = BookManager::store($request);

        return redirect()->route('books.show', ['book' => $book->id]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $authors = BookManager::create();

        return view('book.create', compact('authors'));
    }

    /**
     * @param Book $book
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Book $book)
    {
        $dataForShow = BookManager::show($book);
        $authors = $dataForShow['authors'];
        $countAuthor = $dataForShow['countAuthor'];

        return view('book.show', compact(['book', 'authors', 'countAuthor']));
    }

    /**
     * @param Book $book
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Book $book)
    {
        $dataForEdit = BookManager::edit($book);
        $authorsBook = $dataForEdit['authorsBook'];
        $authorsAll = $dataForEdit['authorsAll'];

        return view('book.edit', compact(['book', 'authorsBook', 'authorsAll']));
    }

    /**
     * @param UpdateBook $request
     * @param Book $book
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateBook $request, Book $book)
    {
        $book = BookManager::update($request, $book);

        return redirect()->route('books.show', ['book' => $book->id]);
    }

    /**
     * @param Book $book
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Book $book)
    {
        BookManager::destroy($book);

        return redirect()->back();
    }
}
