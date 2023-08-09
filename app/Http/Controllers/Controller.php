<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    protected $user;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = session('user');
            if ($this->user == null) {
                $e='Session expired';
                return redirect('/login')->withErrors($e); 
            }
            return $next($request);
        });
    }


    use AuthorizesRequests, ValidatesRequests;
}
