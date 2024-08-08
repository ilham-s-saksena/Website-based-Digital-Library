<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category(CategoryService $categoryService)
    {
        $user = auth()->user();
        $data = $categoryService->category();
        return view('pages.category', compact('data'));
    }

    public function category_create(CategoryService $categoryService, Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string'
        ]);

        if ($categoryService->category_create($validated)) {
            return back()->with('success', 'Category Successfully Created!');
        }
        return back()->with('error', 'Category Already Exist!');
    }

    public function category_delete(CategoryService $categoryService, Category $category)
    {
        if ($categoryService->category_delete($category)) {
            return back()->with('success', 'Category Successfully Deleted!');
        }
        return back()->with('error', 'There are several books in this category, you cannot delete this category!');
    }

    public function category_update(CategoryService $categoryService, Category $category, Request $request)
    {
        $validated = $request->validate([
            'name' =>'required'
        ]);
        try {
            $categoryService->category_update($category, $validated['name']);
        } catch (\Throwable $th) {
            return back()->with('error', 'Some Error on Server!');
        }
        return back()->with('success', 'Category Successfully Updated!');
        
    }
}
