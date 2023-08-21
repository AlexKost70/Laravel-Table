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
        $data = DB::table('users')->leftJoin('infos', 'users.id', '=', 'infos.user_id')->select('users.*', 'infos.phone', 'infos.address')
            ->orderBy('id', 'asc')->get();
        return response($data, 200);
    }

    public function getUsersByFilter(SearchRequest $request)
    {
        $data = $request->validated();
        $users = DB::table('users')->leftJoin('infos', 'users.id', '=', 'infos.user_id')->select('users.*', 'infos.phone', 'infos.address')
            ->when($data['search'], function ($query,$search) {
                $query->where('name', 'like', '%'.$search.'%')
                    ->orderBy('id', 'asc');
            })
            ->when($data['date'], function ($query, $date) {
                $query->where('users.created_at', '>=', $date)
                    ->where('users.created_at', '<=', Carbon::parse($date)->addDay()->format('Y-m-d'))
                    ->orderBy('id', 'asc');
            })
            ->when($data['sort_column'], function ($query, $sortValues) {
                $query->orderBy($sortValues[0], $sortValues[1]);
            })
            ->get();
        return response($users, 200);
    }
}
