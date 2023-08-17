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
        $users = DB::table('users')->get();

        return view('table', ['users' => $users]);
    }

    public function search(SearchRequest $request): View
    {
        $data = $request->validated();
        $users = DB::table('users')
            ->when($data['search'],function ($query,$search) {
                $query->where('name', 'like', '%'.$search.'%');
            })
            ->when($data['date'], function ($query, $date) {
                $query->where('created_at', '>=', $date)
                    ->where('created_at', '<=', Carbon::parse($date)->addDay()->format('Y-m-d'));
            })
            ->get();
        return view('table', ['request' => $data['search'], 'users' => $users]);
    }
}
