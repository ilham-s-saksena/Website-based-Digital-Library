<?php

namespace App\Exports;

use App\Models\Book;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\Auth;

class BooksExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            $books = Book::with(['categories', 'users'])->get();
        } else {
            $books = Book::with(['categories', 'users'])->where('user_id', $user->id)->get();
        }

        return $books->map(function ($book) {
            return [
                'ID' => $book->id,
                'Title' => $book->book_title,
                'User' => $book->users->name,
                'Category' => $book->categories->name,
                'Description' => $book->description,
                'Number of Books' => $book->number_of_books,
                'File' => $book->file,
                'Cover' => $book->cover,
                'Created At' => $book->created_at,
                'Updated At' => $book->updated_at,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'ID',
            'Title',
            'User',
            'Category',
            'Description',
            'Number of Books',
            'File',
            'Cover',
            'Created At',
            'Updated At'
        ];
    }
}
