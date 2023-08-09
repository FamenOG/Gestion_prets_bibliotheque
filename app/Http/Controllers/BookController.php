<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Book;
use App\Models\User;
use App\Models\Author;
use App\Models\Client;

class BookController extends Controller
{
    public function catalog(Request $request, Category $category)
    {
        if ($request->has('search')) {
            $books = Book::query()
                ->where('title', 'LIKE', "%{$request->search}%")
                ->orWhere('summary', 'LIKE', "%{$request->search}%")
                ->orWhere('ISBN', 'LIKE', "%{$request->search}%")
                ->orWhereHas('author', function ($query) use ($request) {
                    $query->where('name', 'LIKE', "%{$request->search}%");
                })
                ->orderBy('title', 'asc')
                // ->paginate(1)
                ->get();
        } else {
            $books = $category->books->sortBy('title');
        }

        $data['books'] = $books;
        $data['user'] = $this->user;
        $data['limitedCategories'] = Category::offset(0)->limit(6)->get();
        $data['categories'] = Category::offset(6)->limit(10)->get();
        return view('book.client.catalog')->with($data);
    }



    public function details(Book $book)
    {
        return view('book.client.detail-book')->with('book', $book);
    }


    public function showCategories()
    {
        $data['user'] = $this->user;
        $categories = Category::query()->paginate(2);
        $data['categories'] = $categories;

        return view('book.categories', $data);
    }



    public function library(Client $client)
    {
        $data['user'] = $this->user;
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
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif',
            'summary' => 'required|string',
        ]);
        $file = $request->file('cover');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('img'), $fileName);
        try {
            $author = Author::firstOrCreate(['name' => $request->author]);
            $book = new Book($request->title, $author->id, $request->publication_date, $request->ISBN, $fileName, $request->summary);
            // dd($author->id);
            $book->save();

            $book->categories()->attach($request->input('category'));
            return redirect('/book-catalog/1');
        } catch (\Exception $e) {
            dd($e);
            // return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
