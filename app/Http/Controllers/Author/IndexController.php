<?php

namespace App\Http\Controllers\Author;

use App\Facades\AuthorManager;
use App\Http\Controllers\Controller;
use App\Http\Requests\Authors\StoreAuthor;
use App\Http\Requests\Authors\UpdateAuthor;
use App\Models\Author;

/**
 * Class IndexController
 * @package App\Http\Controllers\Author
 */
class IndexController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $authors = AuthorManager::getList();

        return view('author.index', compact('authors'));
    }

    /**
     * @param StoreAuthor $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreAuthor $request)
    {
        $author = AuthorManager::store($request);

        return redirect()->route('authors.show', ['author' => $author->id]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $books = AuthorManager::create();

        return view('author.create', compact('books'));
    }

    /**
     * @param Author $author
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Author $author)
    {
        $dataForShow = AuthorManager::show($author);
        $books = $dataForShow['books'];
        $countBook = $dataForShow['countBook'];

        return view('author.show', compact(['author', 'books', 'countBook']));
    }

    /**
     * @param Author $author
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Author $author)
    {
        $dataForEdit = AuthorManager::edit($author);
        $booksAuthor = $dataForEdit['booksAuthor'];
        $booksAll = $dataForEdit['booksAll'];

        return view('author.edit', compact(['author', 'booksAuthor', 'booksAll']));
    }

    /**
     * @param UpdateAuthor $request
     * @param Author $author
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateAuthor $request, Author $author)
    {
        $author = AuthorManager::update($request, $author);

        return redirect()->route('authors.show', ['author' => $author->id]);
    }

    /**
     * @param Author $author
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Author $author)
    {
        AuthorManager::destroy($author);

        return redirect()->back();
    }
}
