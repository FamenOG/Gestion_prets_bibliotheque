<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Librarian;

class LibrarianController extends Controller
{
    public function insert()
    {
        $librarian = Librarian::create([
            'nom' => 'fkl,f',
            'prenom' => 'fnkl,f',
            'telephone' => '5+kl,f',
            'adresse' => 'fji,f',
            'email' => 'f,nkl,f',

        ]);
        $librarian->save();
        return $librarian;
    }
}
