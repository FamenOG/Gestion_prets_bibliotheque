<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(function ($request, $next) {
    //         $this->user->numero = 'CL-' . $this->user->id;
    //         $this->user->update();
    //         return $next($request);
    //     });
    // }
}
