<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Services\BookService;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function book(BookService $bookService, CategoryService $categoryService, Request $request)
    {
        $user = auth()->user();

        $filter = $request->input('category-filter') !== null ? $request->input('category-filter') : null;
        
        $data = $bookService->book($user, $filter);
        $category = $categoryService->category();
        return view('pages.book', compact('data', 'category'));
    }

    public function book_create(BookService $bookService, Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'categoryId' => 'required',
            'description' => 'required|string',
            'number_of_book' => 'required|integer',
            'file' => 'required|mimes:pdf|max:10240',
            'cover' => 'required|mimes:jpg,jpeg,png|max:5120',
        ]);

        if ($bookService->book_create(auth()->user()->id, $validated)) {
            return back()->with('success', 'Book Successfully Created!');
        }
        return back()->with('error', 'Some Errors!');
    }

    public function book_delete(BookService $bookService, Book $book)
    {
        if ($bookService->book_delete($book)) {
            return back()->with('success', 'Book Successfully Deleted!');
        }
        return back()->with('error', 'Some Error on Server!');
    }

    public function book_update(BookService $bookService, Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'categoryId' => 'required',
            'description' => 'required|string',
            'number_of_book' => 'required|integer',
            'file' => 'required|mimes:pdf|max:10240',
            'cover' => 'required|mimes:jpg,jpeg,png|max:5120',
        ]);


        if ($bookService->book_update($book, $validated)) {
            return back()->with('success', 'Book Successfully Created!');
        }
        return back()->with('error', 'Some Errors!');
    }

}
