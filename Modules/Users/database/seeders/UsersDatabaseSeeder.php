<?php

namespace Modules\Users\database\seeders;

use Illuminate\Database\Seeder;
use Modules\Users\app\Models\User;

class UsersDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@test.com',
        ]);
    }
}
