<?php

namespace Database\Seeders;

use App\Models\Label;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Label::create(['name' => 'bug']);
        Label::create(['name' => 'question']);
        Label::create(['name' => 'enhancement']);
    }
}
