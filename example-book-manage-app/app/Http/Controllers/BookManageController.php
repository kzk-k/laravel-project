<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookManageRequest;
use App\Models\BookManage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BookManageController extends Controller
{
    const LINK_NUM = 15;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = BookManage::query();

        if (request()->search) {
            $query = BookManage::search(request()->search)->orderBy('id');
        }

        $books = $query->paginate(self::LINK_NUM);

        return view('index', compact('books'));
    }

    public function genre(string $genre)
    {
        $books = BookManage::where('genre', $genre)->paginate(self::LINK_NUM);

        return view('index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prevUrl = url()->previous();

        // スーパーリロードで自ページの場合
        if ($prevUrl === url()->current()) {
            $prevUrl = route('bookManage.index');
        }

        return view('create', compact('prevUrl'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookManageRequest $request)
    {
        BookManage::create($request->validated());

        return Redirect::route('bookManage.create')->with('message', '新規登録しました');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = BookManage::find($id);

        if (! $book) {
            abort(404);
        }

        $prevUrl = url()->previous();

        // スーパーリロードで自ページの場合 || 編集ページから来た場合
        if ($prevUrl === url()->current() || $prevUrl === url()->current().'/edit') {
            $prevUrl = route('bookManage.index');
        }

        return view('show', compact('book', 'prevUrl'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = BookManage::find($id);

        if (! $book) {
            abort(404);
        }

        return view('edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookManageRequest $request, string $id)
    {
        $book = BookManage::find($id);
        $book->fill($request->validated())->save();

        return Redirect::route('bookManage.show', $id)->with('message', '更新しました');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        BookManage::destroy($request->id);

        return Redirect::route('bookManage.index')->with('message', '削除しました');
    }
}
