<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TodoCollection;
use App\Http\Resources\TodoResource;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::query()
            ->with('user')
            ->paginate();

        return new TodoCollection($todos);
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'text' => ['required'],
                'user_id' => ['required', Rule::exists('users', 'id')]
            ]
        );

        $todo = Todo::create($data)->fresh();

        $todo->load('user');

        return TodoResource::make($todo);
    }

    public function show(Todo $todo)
    {
    }

    public function edit(Todo $todo)
    {
    }

    public function update(Request $request, Todo $todo)
    {
        $data = $request->validate(
            [
                'completed' => ['sometimes', 'required', 'bool'],
                'text' => ['sometimes', 'required'],
                'user_id' => ['sometimes', 'required', Rule::exists('users', 'id')]
            ]
        );

        $todo->update($data);
        $todo->load('user');

        return TodoResource::make($todo);
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();

        return response('', Response::HTTP_NO_CONTENT);
    }
}
