<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tag::getTagName();

        return view('pages.admin.home', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $image = Image::createImage($request);

        $image->tags()->sync($request->tags);

        self::saveImageFile($request->file('image'), $image->id);

        return redirect(route('admamin.home.create'))->with('message', '画像を登録しました');
    }

    public static function saveImageFile($imageFile, $imageId)
    {
        // アップロードされた画像の拡張子を取得
        $extension = $imageFile->getClientOriginalExtension();
        // storate/app/public/imageディレクトリ, 別名を付けて保存
        $imageFile->storeAs('public/image', $imageId.'.'.$extension);
    }
}
