<?php

namespace Database\Seeders;

use App\Models\Prefecture;
use Illuminate\Database\Seeder;

class PrefectureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (config('const.PREFECTURES') as $pref) {
            Prefecture::updateOrCreate(['name' => $pref]);
        }
    }
}
