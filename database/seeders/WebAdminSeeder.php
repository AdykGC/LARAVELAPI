<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class WebAdminSeeder extends Seeder {
    public function run(): void {
        $WebAdmin = User::create([
            "full_name"=> "Junior Admin RIKS",
            "university_email" => "Mandarin@Carbon.drink",
            "email" => "Mandarin@Carbonated.drink",
            "password" => Hash::make("Qaz123edc"),
        ]);

        Role::create([
            'name'=> 'Website Admin',
        ]);
        
        $WebAdmin->assignRole('Website Admin');
    }
}
