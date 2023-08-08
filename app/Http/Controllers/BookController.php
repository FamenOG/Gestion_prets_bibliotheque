<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Book;
use App\Models\User;
use App\Models\Client;

class BookController extends Controller
{
    public function catalog(Request $request, Category $category)
    {
        if($request->has('search')){
            $data['books']= Book::where('title', 'LIKE', "%{$request->search}%")
            ->orWhere('author', 'LIKE', "%{$request->search}%")
            ->orWhere('summary', 'LIKE', "%{$request->search}%")
            ->orWhere('ISBN', 'LIKE', "%{$request->search}%")
            ->get();
        }
        else{
            $data['books'] = $category->books;
        }
        $data['user'] = $this->user;
        $data['limitedCategories'] = Category::offset(0)->limit(6)->get();
        $data['categories'] = Category::offset(6)->limit(10)->get();
        return view('book.client.catalog')->with($data);
    }

    public function details(Book $book)
    {
        return view('book.client.detail-book')->with('book', $book);
    }

    public function library(Client $client)
    {
        $data['client'] = $client;
        $data['books'] = $client->getBooks();
        return view('book.client.library')->with($data);
    }

    public function create(Request $request)
    {

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
        $file->move(public_path('img'), $fileName);
        try {
            $book = new Book($request->title, $request->author, $request->publication_date, $request->ISBN, $fileName, $request->summary);
            $book->insert($request->input('category'));
            return redirect('/book-catalog/1');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
