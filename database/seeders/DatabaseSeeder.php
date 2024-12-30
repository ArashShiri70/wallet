<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Gateway;
use App\Models\Transaction;
use Illuminate\Foundation\Testing\RefreshDatabase;
class DatabaseSeeder extends Seeder
{
    use RefreshDatabase;
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $gateways = ["zarin_pal", "mellat", "melli", "pasargad"];
        foreach ($gateways as $gateway) {
            Gateway::factory()->state(['name' => $gateway])->create();
        }

        $users = User::factory(10)->create();

        foreach ($users as $user) {
            Transaction::factory(10)->for($user)->create();
        }
    }
}
