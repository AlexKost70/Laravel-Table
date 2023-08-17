<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class MainController extends Controller
{
    public function index(): View
    {
        $users = DB::table('users')->get();

        return view('table', ['users' => $users]);
    }
}
