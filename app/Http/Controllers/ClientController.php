<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ClientController extends Controller
{
    public function store(Request $request, $user)
    {
        $user = Auth::user();

    }
}
