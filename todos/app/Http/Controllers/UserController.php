<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserCollection;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return UserCollection::make(User::query()->paginate());
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $users = User::query()
            ->where('name', 'like', "%$query%")
            ->paginate();

        return UserCollection::make($users);
    }
}
