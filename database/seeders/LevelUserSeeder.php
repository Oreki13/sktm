<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class LevelUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_level_user')->insert([
            'id' => Uuid::uuid4(),
            'name' => 'superadmin',
            'level_id' => '1',
            'created_at' => Carbon::now()->toDateTimeString()
        ]);
        DB::table('tbl_level_user')->insert([
            'id' => Uuid::uuid4(),
            'name' => 'lurah',
            'level_id' => '2',
            'created_at' => Carbon::now()->toDateTimeString()
        ]);
        DB::table('tbl_level_user')->insert([
            'id' => Uuid::uuid4(),
            'name' => 'admin',
            'level_id' => '3',
            'created_at' => Carbon::now()->toDateTimeString()
        ]);
    }
}
