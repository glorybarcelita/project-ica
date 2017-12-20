<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'role_id' => 1,
            'is_active' => 1,
            'firstname' => 'Juan',
            'middlename' => 'P.',
            'lastname' => 'Dela Cruz',
            'email' => 'registrar@example.com',
            'password' => '123'
        ]);
        
        User::create([
            'role_id' => 2,
            'is_active' => 1,
            'firstname' => 'Gillian',
            'middlename' => 'S.',
            'lastname' => 'Dela Cruz',
            'email' => 'lecturer@example.com',
            'password' => '123'
        ]);
        
        User::create([
            'role_id' => 3,
            'is_active' => 1,
            'firstname' => 'Anne',
            'middlename' => 'S.',
            'lastname' => 'Cruz',
            'email' => 'student@example.com',
            'password' => '123'
        ]);
        
        User::create([
            'role_id' => 4,
            'is_active' => 1,
            'firstname' => 'Mads',
            'middlename' => 'S.',
            'lastname' => 'Ramos',
            'email' => 'acadhead@example.com',
            'password' => '123'
        ]);
    }
}
