<?php

namespace Database\Seeders;

use App\Models\Employer;
use App\Models\JobApplication;
use App\Models\Joblisting;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        \App\Models\User::factory()->create([
            'name' => 'Rishabh kumar singh',
            'email' => 'rishabhsingh155216@gmail.com',
        ]);

        User::factory(300)->create();
        $users = User::all()->shuffle();
        for ($i = 0; $i < 20; $i++) {
            Employer::factory()->create([
                'user_id' => $users->pop()->id
            ]);
        }

        $employers = Employer::all();
        for ($i = 0; $i < 100; $i++) {
            Joblisting::factory()->create([
                'employer_id' => $employers->random()->id
            ]);
        }

        foreach ($users as $user) {
            $jobs = Joblisting::inRandomOrder()->take(rand(0, 4))->get();

            foreach ($jobs as $job) {
                JobApplication::factory()->create([
                    'joblisting_id' => $job->id,
                    'user_id' => $user->id,

                ]);
            }
        }
    }
}
