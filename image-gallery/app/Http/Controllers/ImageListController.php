<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Tag;
use Illuminate\Http\Request;

class ImageListController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $query = Image::query()->with('tags');
        $search = request()->input('search');

        if ($search) {
            $query->search($search);
        }

        $images = $query->paginate(100);

        return view('pages.admin.imageList', compact('images'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Tag::createTag($request);

        return redirect(route('admin.imageList.create'))->with('message', 'タグを登録しました');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $image = Image::find($id);
        $tags = Tag::getTagName();

        return view('pages.admin.imageListEdit', compact(['image', 'tags']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $image = Image::find($id);
        $image->update([
            'title_ja' => $request->title_ja,
            'is_hidden' => $request->is_hidden,
        ]);

        $image->tags()->sync($request->tags);

        return redirect(route('admin.imageList.create'))->with('message', '更新しました');
    }
}
