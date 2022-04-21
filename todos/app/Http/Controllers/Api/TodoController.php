<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TodoCollection;
use App\Http\Resources\TodoResource;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::query()->paginate();

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
            ]
        );

        $todo = Todo::create($data);

        return TodoResource::make($todo->fresh());
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
            ]
        );

        $todo->update($data);

        return TodoResource::make($todo);
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();

        return response('', Response::HTTP_NO_CONTENT);
    }
}
