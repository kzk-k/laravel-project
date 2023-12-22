<?php

namespace App\View\Composers;

use App\Models\Prefecture;
use Illuminate\View\View;

class ContactIndexComposer
{
    public function __construct()
    {
    }

    public function compose(View $view): void
    {
        $prefectures = Prefecture::query()
            ->orderBy('id')
            ->get(['id', 'name']);
        $view->with('prefectures', $prefectures);
    }
}
