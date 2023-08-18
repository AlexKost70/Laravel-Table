<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function getUsersList()
    {
        $data = DB::table('users')->get();
        return response($data, 200);
    }

    public function getUsersByFilter(SearchRequest $request)
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
            ->when($data['sort_column'], function ($query, $sortValues) {
                $query->orderBy($sortValues[0], $sortValues[1]);
            })
            ->get();

        return response($users, 200);
    }
}
