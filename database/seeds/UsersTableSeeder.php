<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'first_name' => 'Super',
            'last_name'  => 'Admin',
            'email'      => 'superadmin@example.com',
        ]);
    }
}
