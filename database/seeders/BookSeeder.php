<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::where('role', 'user')->get();
        $categories = Category::all();

        foreach ($users as $user) {
            foreach ($categories as $category) {

                $fileName = time() . '_' . uniqid() . '.pdf';
                $coverName = time() . '_' . uniqid() . '.jpg';

                Storage::put('private/file/' . $fileName, $this->generateDummyPDF());
                Storage::put('private/cover/' . $coverName, $this->generateDummyImage());


                Book::create([
                    'book_title' => 'The First Book of '. $category->name . " by " . $user->name,
                    'user_id' => $user->id,
                    'category_id' => $category->id,
                    'description' => fake()->address(),
                    'number_of_books' => 124,
                    'file' => $fileName,
                    'cover'=> $coverName,
                ]);

                $fileName = time() . '_' . uniqid() . '.pdf';
                $coverName = time() . '_' . uniqid() . '.jpg';

                Storage::put('private/file/' . $fileName, $this->generateDummyPDF());
                Storage::put('private/cover/' . $coverName, $this->generateDummyImage());


                Book::create([
                    'book_title' => 'This is Second Book of '. $category->name . " by " . $user->name,
                    'user_id' => $user->id,
                    'category_id' => $category->id,
                    'description' => fake()->address(),
                    'number_of_books' => 124,
                    'file' => $fileName,
                    'cover'=> $coverName,
                ]);
            }
        }
    }

    private function generateDummyPDF()
    {
        return file_get_contents(public_path('dummy.pdf'));
    }
    private function generateDummyImage()
    {
        return file_get_contents(public_path('dummy.jpg'));
    }
}