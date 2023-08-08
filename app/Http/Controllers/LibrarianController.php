<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Client;
use App\Models\Category;

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
        $categories= Category::all();
        $users = ($request->has('search')) ? Client::where('numero', 'LIKE', "%{$request->search}%")->get() : Client::all();
        return view('client.list-client')->with(['users'=>$users,'categories'=>$categories]);
    }

    public function formCreate()
    {
        $categories = Category::all();
        return view('book.create-book', compact('categories'));
    }
}
