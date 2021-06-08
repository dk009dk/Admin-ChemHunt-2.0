<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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
         User::factory(5)->create()->each(function ($user){
             $admin = Admin::all()->random();
             $user->admin()->associate($admin)->save();

             $user->result()->create([
                 'day_1_r_1'=>\Arr::random([0,1,2,3,4,5]),
                 'day_1_r_2'=>\Arr::random([0,1,2,3,4,5]),
                 'day_1_r_3'=>\Arr::random([0,1,2,3,4,5]),
                 'day_1_r_4'=>\Arr::random([0,1,2,3,4,5]),
                 'day_2_r_1'=>\Arr::random([0,1,2,3,4,5]),
                 'day_2_r_2'=>\Arr::random([0,1,2,3,4,5]),
                 'day_2_r_3'=>\Arr::random([0,1,2,3,4,5]),
                 'day_2_r_4'=>\Arr::random([0,1,2,3,4,5]),
                 'day_3_r_1'=>\Arr::random([0,1,2,3,4,5]),
                 'day_3_r_2'=>\Arr::random([0,1,2,3,4,5]),
                 'day_3_r_3'=>\Arr::random([0,1,2,3,4,5]),
                 'day_3_r_4'=>\Arr::random([0,1,2,3,4,5]),
                 'day_4_r_1'=>\Arr::random([0,1,2,3,4,5]),
                 'day_4_r_2'=>\Arr::random([0,1,2,3,4,5]),
                 'day_4_r_3'=>\Arr::random([0,1,2,3,4,5]),
                 'day_4_r_4'=>\Arr::random([0,1,2,3,4,5]),
                 'day_5_r_1'=>\Arr::random([0,1,2,3,4,5]),
                 'day_5_r_2'=>\Arr::random([0,1,2,3,4,5]),
                 'day_5_r_3'=>\Arr::random([0,1,2,3,4,5]),
                 'day_5_r_4'=>\Arr::random([0,1,2,3,4,5]),
                 'day_6_r_1'=>\Arr::random([0,1,2,3,4,5]),
                 'day_6_r_2'=>\Arr::random([0,1,2,3,4,5]),
                 'day_6_r_3'=>\Arr::random([0,1,2,3,4,5]),
                 'day_6_r_4'=>\Arr::random([0,1,2,3,4,5]),
                 'day_7_r_1'=>\Arr::random([0,1,2,3,4,5]),
                 'day_7_r_2'=>\Arr::random([0,1,2,3,4,5]),
                 'day_7_r_3'=>\Arr::random([0,1,2,3,4,5]),
                 'day_7_r_4'=>\Arr::random([0,1,2,3,4,5]),
             ]);

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
                 'day_1_q_1'=>Str::random('5'),
                 'day_1_q_2'=>Str::random('5'),
                 'day_1_q_3'=>Str::random('5'),
                 'day_1_q_4'=>Str::random('5'),
                 'day_1_time'=>Carbon::now(),
                 'day_2_q_1'=>Str::random('5'),
                 'day_2_q_2'=>Str::random('5'),
                 'day_2_q_3'=>Str::random('5'),
                 'day_2_q_4'=>Str::random('5'),
                 'day_2_time'=>Carbon::now(),
                 'day_3_q_1'=>Str::random('5'),
                 'day_3_q_2'=>Str::random('5'),
                 'day_3_q_3'=>Str::random('5'),
                 'day_3_q_4'=>Str::random('5'),
                 'day_3_time'=>Carbon::now(),
                 'day_4_q_1'=>Str::random('5'),
                 'day_4_q_2'=>Str::random('5'),
                 'day_4_q_3'=>Str::random('5'),
                 'day_4_q_4'=>Str::random('5'),
                 'day_4_time'=>Carbon::now(),
                 'day_5_q_1'=>Str::random('5'),
                 'day_5_q_2'=>Str::random('5'),
                 'day_5_q_3'=>Str::random('5'),
                 'day_5_q_4'=>Str::random('5'),
                 'day_5_time'=>Carbon::now(),
                 'day_6_q_1'=>Str::random('5'),
                 'day_6_q_2'=>Str::random('5'),
                 'day_6_q_3'=>Str::random('5'),
                 'day_6_q_4'=>Str::random('5'),
                 'day_6_time'=>Carbon::now(),
                 'day_7_q_1'=>Str::random('5'),
                 'day_7_q_2'=>Str::random('5'),
                 'day_7_q_3'=>Str::random('5'),
                 'day_7_q_4'=>Str::random('5'),
                 'day_7_time'=>Carbon::now(),
             ]);
         });
    }
}
