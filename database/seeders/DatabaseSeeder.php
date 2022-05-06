<?php

namespace Database\Seeders;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::factory(7)->create();

        DB::table('payments')->insert([
            [
                "user_id" => 1,
                "is_deleted" => 0,
                "operation_sum" => 1500,
                "created_at" => "2020-06-01 12:31:30"
            ],
            [
                "user_id" => 1,
                "is_deleted" => 0,
                "operation_sum" => 1500,
                "created_at" => "2020-06-01 12:31:30"
            ],
            [
                "user_id" => 1,
                "is_deleted" => 0,
                "operation_sum" => 2500,
                "created_at" => "2020-06-01 12:31:30"

            ],
            [
                "user_id" => 2,
                "is_deleted" => 0,
                "operation_sum" => 4500,
                "created_at" => "2020-06-01 12:31:30"

            ],
        ]);
    }
}
