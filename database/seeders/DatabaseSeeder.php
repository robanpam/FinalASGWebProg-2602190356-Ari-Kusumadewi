<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $faker = Faker::create('en_EN');

        for ($i = 0; $i < 20; $i++) {
            DB::table('users')->insert([
                'name' => $faker->name(),
                'email' => $faker->email(),
                'password' => Hash::make('123456789'),
                'gender' => $faker->randomElement($array = ['Male', 'Female']),
                'hobbies' => implode(', ', $faker->randomElements([
                'Reading', 'Writing', 'Traveling', 'Sports', 'Music', 'Cooking',
                'Gaming', 'Photography', 'Art', 'Fitness'], $faker->numberBetween(1, 3))),
                'mobile_number' => $faker->phoneNumber(),
                'has_paid' => 1,
                'register_price' => rand(100000, 125000),
                'profile_path' => 'profile_dummy/' . $faker->numberBetween(1, 3) . '.jpeg',
            ]);
        }

        for ($i = 0; $i < 20; $i++) {
            $sender_id = $faker->numberBetween(1, 20);
            $receiver_id = $faker->numberBetween(1, 20);

            while ($sender_id === $receiver_id) {
                $receiver_id = $faker->numberBetween(1, 20);
            }

            DB::table('friend_requests')->insert([
                'sender_id' => $sender_id,
                'receiver_id' => $receiver_id
            ]);
        }

        for ($i = 0; $i < 20; $i++) {
            $user_id = $faker->numberBetween(1, 20);
            $friend_id = $faker->numberBetween(1, 20);

            while ($user_id === $friend_id) {
                $friend_id = $faker->numberBetween(1, 20);
            }

            DB::table('friends')->insert([
                'user_id' => $user_id,
                'friend_id' => $friend_id
            ]);
        }
    }
}
