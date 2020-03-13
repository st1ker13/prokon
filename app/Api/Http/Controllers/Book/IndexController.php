<?php

namespace App\Api\Http\Controllers\Book;

use App\Api\Facades\BookManager;
use App\Api\Facades\Response;
use App\Api\Http\Requests\Books\UpdateBook;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

/**
 * Class IndexController
 * @package App\Api\Http\Controllers\Book
 */
class IndexController extends Controller
{
    /**
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        $books = BookManager::getList();

        return Response::callResponse($books);
    }

    /**
     * @param int $book
     * @return JsonResponse
     */
    public function show(int $book)
    {
        $book = BookManager::show($book);

        return Response::callResponse($book);
    }

    /**
     * @param UpdateBook $request
     * @param int $book
     * @return JsonResponse
     */
    public function update(UpdateBook $request, int $book)
    {
        $book = BookManager::update($request, $book);

        return Response::callResponse($book);
    }

    /**
     * @param int $book
     * @return JsonResponse
     */
    public function destroy(int $book)
    {
        $message = BookManager::destroy($book);

        return Response::callResponse($message);
    }

}
