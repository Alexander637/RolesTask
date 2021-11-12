<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function api()
    {
        $user = auth()->user();

        return response()->json($user);
    }
}
