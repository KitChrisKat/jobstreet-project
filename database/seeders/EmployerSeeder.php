<?php
use Illuminate\Database\Seeder;
use App\Models\Employers;

class EmployerSeeder extends Seeder
{
    public function run()
    {
        Employers::create([
            'user_id' => 1, // Replace with an existing user ID
            'company_name' => 'Tech Solutions Inc.',
            'company_email' => 'contact@techsolutions.com',
            'location' => 'New York, USA',
        ]);
    }
}