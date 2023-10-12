<?php

namespace App\Services;

use App\Models\Book;

class BookService
{
    public function createOrUpdate(array $data, Book $book = null): void
    {
        $authorsData =  $data['authors'];
        unset($data['authors']);

        if ($book) {
            $book->update($data);
        } else {
            $conditions = [
                'title' => $data['title'],
            ];
            $book = Book::updateOrCreate($conditions, $data);

        }
        $book->authors()->sync($authorsData);
    }
}
