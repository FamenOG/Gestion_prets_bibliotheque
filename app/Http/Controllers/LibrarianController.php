<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Client;
use App\Models\Category;
use App\Models\Librarian;
use App\Models\Book;
use App\Models\Loan;
use App\Models\Library;

class LibrarianController extends Controller
{

    public function __construct() {
        parent::__construct();
        $this->middleware(function ($request, $next) {
            if ($this->user->role_id != 2) {
                return redirect()->back();
            }
            return $next($request);
        });
    }
        
    public function listClient(Request $request) {
        $categories = Category::all();
        $perPage = 1;
        $usersQuery = ($request->has('search'))
            ? Client::where('numero', 'LIKE', "%{$request->search}%")
                    ->orWhere('name', 'LIKE', "%{$request->search}%")
                    ->orWhere('firstname', 'LIKE', "%{$request->search}%")
            : Client::query();
    
        $users = $usersQuery->paginate($perPage);
    
        return view('client.list-client')->with(['users' => $users, 'categories' => $categories]);
    }
    

    public function bookFormCreate()
    {
        $categories = Category::all();
        return view('book.create-book', compact('categories'));
    }
    public function createCategory(Request $request)
    {
        // dd($request->name);
        $category = new Category($request->name);
        $category->save();
        return redirect('/categories');
    }


    public function loan(Librarian $librarian, Client $client, Book $book) {
        $librarian->loan($client, $book);
        return redirect()->back();
    }

    public function backBook(Librarian $librarian, Loan $loan) {
        $librarian->back($loan);
        return redirect()->back();
    }

    public function lostBook(Librarian $librarian,Loan $loan) {
        $book = Library::where('id', $loan->book_id)->first();
        $book->lost($librarian,$loan);
        return redirect()->back();
    }

}
