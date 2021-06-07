<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class
DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         User::factory(500)->create()->each(function ($user){
             $admin = Admin::all()->random();
             $user->admin()->associate($admin)->save();

             $user->task()->create([
                 'day_1' => 'Pending',
                 'day_2' => 'Pending',
                 'day_3' => 'Pending',
                 'day_4' => 'Pending',
                 'day_5' => 'Pending',
                 'day_6' => 'Pending',
                 'day_7' => 'Pending',
             ]);

             $user->answer()->create([
                 'day_1_q_1' => null,
             ]);
         });
    }
}
