<?php

namespace Database\Seeders;

use App\Models\BookManage;
use Illuminate\Database\Seeder;

class BookManageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        BookManage::factory(100)->create();
    }
}
