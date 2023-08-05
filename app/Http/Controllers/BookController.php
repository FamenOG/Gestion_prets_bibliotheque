<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Book;

class BookController extends Controller
{
    public function catalog()
    {
        return view('book.client.catalog');
    }
    public function details()
    {
        return view('book.client.detail-book');
    }
    public function library()
    {
        return view('book.client.library');
    }
    public function formCreate() {
        $categories = Category::all();
        return view('book.create-book', compact('categories'));
    }
    public function create(Request $request)
    {
        // $book= Book::find();
        $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'publication_date' => 'required|date',
            'ISBN' => 'required|numeric|unique:books|digits:13',
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif', // Change the 'image' to 'file' if you want to allow any file type.
            'summary' => 'required|string',
        ]);
        $file = $request->file('cover');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('public/img', $fileName);


        $book= new Book($request->title,$request->author,$request->publication_date,$request->ISBN,$request->cover,$request->summary);
        
        // dd($request);    
        $book->save();

        $categories = $request->input('categories');

        // Ajouter les catégories associées au livre dans la table de pivot book_category
        // foreach ($categories as $category) {
        $book->categories()->attach($categories);
        // }
        return redirect('/book-catalog');
    }
    
}
