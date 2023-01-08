<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_users')->insert([
            'id' => Uuid::uuid4(),
            'username' => 'superadmin',
            'level_id' => '1',
            'email' => 'oreki1306@gmail.com',
            'password' => Hash::make('123@admin'),
            'is_deleted' => 0,
            'created_at' => Carbon::now()->toDateTimeString()

        ]);
    }
}
