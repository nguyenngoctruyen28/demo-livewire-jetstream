<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Comment extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        DB::table('comments')->insert([
            [
                'body' => 'This is first comment',
                'user_id' => '1',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
