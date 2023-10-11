<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Penalty;
use App\Models\Library;
use App\Models\Book;

class ClientController extends Controller
{
    protected $table = 'v_client';
    public function notify()
    {
        $books = Library::all();
        $datas = [];

        foreach ($books as $book) {
            $daysLate = $book->verifyLate();
            if ($daysLate) {
                $penaltyAmount = 5000 * $daysLate;

                $data = [
                    'book' => $book,
                    'daysLate' => $daysLate,
                    'penaltyAmount' => $penaltyAmount
                ];

                $datas[] = $data;
            }
        }

        return view('book.client.notifications', compact('datas'));
    }
}
