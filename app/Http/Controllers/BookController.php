<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
