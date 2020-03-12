<?php

namespace App\Manager;

use App\Models\Book;

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
}
