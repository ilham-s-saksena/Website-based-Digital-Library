<?php

namespace App\Services;
use App\Models\Category;
use App\Models\User;

class CategoryService
{
    public function category(){
        $category = Category::all();
        return $category;
    }

    public function category_create(array $data){

        $categoryName = ucfirst($data['name']);
        if (Category::where('name', $categoryName)->first()) {
            return false;
        }

        Category::create([
            'name' => $categoryName
        ]);
        return true;

    }

    public function category_delete(Category $category){
        try {
            $category->delete();
        } catch (\Throwable $th) {
            return false;
        }
        return true;
    }

    public function category_update(Category $category, string $categoryName){
        $category->name = $categoryName;
        $category->save();
    }
}