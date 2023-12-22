<?php

namespace App\View\Creators;

use App\Models\Prefecture;
use Illuminate\View\View;

class ContactConfirmCreator
{
    public function __construct()
    {
    }

    public function create(View $view): void
    {
        $data = $view->getData();
        $prefecture = Prefecture::find($data['prefecture_id']);

        $view->with([
            'prefectureName' => $prefecture->name,
        ]);
    }
}
