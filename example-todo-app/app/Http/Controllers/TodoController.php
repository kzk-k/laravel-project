<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;
use Illuminate\View\View;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $todos = Todo::all();

        return view('index', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create(): View
    // {
    //     return view('index');
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TodoRequest $request): RedirectResponse
    {
        // $attributes =  $request->only(['title', 'body']);
        // Todo::create($attributes);
        // $todo->create($request->validated());
        Todo::create($request->validated());

        session()->flash('message', '保存しました');

        return redirect(route('index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $todo = Todo::find($id);

        return view('show', compact('todo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $todo = Todo::find($id);

        return view('edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TodoRequest $request, string $id): RedirectResponse
    {
        $todo = Todo::find($id);
        // $todo->update($request->validated());
        $todo->fill($request->validated())->save();

        session()->flash('message', '上書きしました');

        return redirect(route('index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $todo = Todo::find($request->id);
        $todo->delete();

        // session()->flash('message', '削除しました');

        return redirect(route('index'))->with('message', 'with削除しました');
    }
}
