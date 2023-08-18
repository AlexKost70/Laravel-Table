<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class MainController extends Controller
{
    public function index(): View
    {
        return view('table');
    }
}
