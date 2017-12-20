<?php

use Illuminate\Database\Seeder;
use App\Models\Course;
class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::create([
            
            'is_active' => 1,
            'name' => 'BSIT',
            'description' => 'Sample Description for BSIT.',
        
        ]);
        
      
        
       Course::create([
            
            'is_active' => 1,
            'name' => 'BSCS',
            'description' => 'Sample Description for BSCS.',
        
        ]);
    }
}
