<?php

namespace App\Services;
use App\Models\Book;
use App\Models\User;
use Storage;

class BookService
{
    public function book(User $user, $filter){
        if ($user->role == 'admin') {
            $books = Book::all();
        } else {
            $books = Book::where('user_id', $user->id)->get();
        }
        if ($filter !== null) {
            $books = $books->whereIn('category_id', $filter);
        }
        return $books;
    }

    public function book_create(string $userId, array $data){
        try {
            $fileName = time() . '_' . uniqid() . '.' . $data['file']->getClientOriginalExtension();
            $data['file']->storeAs('private/file', $fileName);
            $coverName = time() . '_' . uniqid() . '.' . $data['cover']->getClientOriginalExtension();
            $data['cover']->storeAs('private/cover', $coverName);

            Book::create([
                'book_title' => $data['title'],
                'user_id' => $userId,
                'category_id' => $data['categoryId'],
                'description' => $data['description'],
                'number_of_books' => $data['number_of_book'],
                'file' => $fileName,
                'cover'=> $coverName,
            ]);
        } catch (\Throwable $th) {
            return false;
        }
        return true;
    }

    public function book_delete(Book $book){
        if ($book->delete()) {
            $path = 'private/cover/' . $book->cover;
            Storage::delete($path);
            $path = 'private/file/' . $book->file;
            Storage::delete($path);
            return true;
        }
        return false;
    }

    public function book_update(Book $book, array $data){
        try {
            $path = 'private/cover/' . $book->cover;
            Storage::delete($path);
            $path = 'private/file/' . $book->file;
            Storage::delete($path);

            $fileName = time() . '_' . uniqid() . '.' . $data['file']->getClientOriginalExtension();
            $data['file']->storeAs('private/file', $fileName);
            $coverName = time() . '_' . uniqid() . '.' . $data['cover']->getClientOriginalExtension();
            $data['cover']->storeAs('private/cover', $coverName);

            $book->book_title = $data['title'];
            $book->category_id = $data['categoryId'];
            $book->description = $data['description'];
            $book->number_of_books = $data['number_of_book'];
            $book->file = $fileName;
            $book->cover= $coverName;

            $book->save();
            
        } catch (\Throwable $th) {
            return false;
        }
        return true;
    }
}