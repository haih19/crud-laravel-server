<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(10)->create();

        // $users = DB::table('users')->get();

        // foreach ($users as $user) {
        //     DB::table('users')
        //         ->where('id', $user->id)
        //         ->update(['age' => rand(18, 99)]);
        // }
    }
}
