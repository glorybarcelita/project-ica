<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'Registrar',
            'description' => 'Registrar'
        ]);
        Role::create([
            'name' => 'Lecturer',
            'description' => 'Lecturer'
        ]);
        Role::create([
            'name' => 'Student',
            'description' => 'Student'
        ]);
        Role::create([
            'name' => 'Academic Head',
            'description' => 'Academic Head'
        ]);
    }
}
