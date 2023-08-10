<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Penalty;
use App\Models\Librarian;
use App\Models\Book;

class ClientController extends Controller
{
    protected $table = 'v_client';
    public function notify()
    {

        // dd($penalties= Penalty::all());
        return view('book.client.notifications');
    }
}
