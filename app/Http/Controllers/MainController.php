<?php

namespace App\Http\Controllers;

use App\Services\BookService;
use App\Services\CategoryService;
use App\Services\MainService;
use Illuminate\Http\Response;
use Storage;

class MainController extends Controller
{
    public function dashboard(BookService $bookService, CategoryService $categoryService, MainService $mainService) {
        $user = auth()->user();
        
        $book = $bookService->book($user, null)->count();
        $category = $categoryService->category()->count();
        $users = $user->role == 'admin' ? $mainService->dashboard() : null;

        return view('pages.index', compact('book', 'category', 'users'));
    }

    public function file($filename)
    {
        $path = 'private/file/' . $filename;
        if (!Storage::exists($path)) {
            abort(404, 'File not found.');
        }

        $file = Storage::get($path);
        $mimeType = Storage::mimeType($path);
        $headers = [
            'Content-Type' => $mimeType,
            'Content-Disposition' => 'inline; filename="' . basename($path) . '"',
        ];
        return response($file, 200)->header('Content-Type', $mimeType)
                                ->header('Content-Disposition', 'inline; filename="' . basename($path) . '"');
    }

    public function cover($filename){
        $path = 'private/cover/' . $filename;
        if (!Storage::exists($path)) {
            abort(403, $path);
        }
        $file = Storage::get($path);
        $mimeType = Storage::mimeType($path);
        return response($file, 200)->header('Content-Type', $mimeType);
    }
}
