<?php namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder {
    public function run(): void {
        Role::firstOrCreate(['guard_name' => 'sanctum', 'name' => 'Website Admin']);
        Role::firstOrCreate(['guard_name' => 'sanctum', 'name' => "Teacher"]);
        Role::firstOrCreate(['guard_name' => 'sanctum', 'name' => "Student"]);

        $USR1 = User::firstOrCreate([
            "full_name"=> "Junior Admin RIKS",
            "university_email" => "Mandarin@Carbon.drink",
            "email" => "Mandarin@Carbonated.drink",
            "password" => Hash::make("Qaz123edc"),
        ]);
        $USR1->assignRole('Website Admin');

        $USR2 = User::firstOrCreate([
            "full_name"=> "Lester",
            "university_email" => "Hack@gta.drink",
            "email" => "Farin@coffee.drink",
            "password" => Hash::make("Qaz123edc"),
        ]);
        $USR2->assignRole('Teacher');

        $USR3 = User::firstOrCreate([
            "full_name"=> "Adidas",
            "university_email" => "Adidas@gmail.com",
            "email" => "Mand@Adid.com",
            "password" => Hash::make("Qaz123edc"),
        ]);
        $USR3->assignRole('Student');
    }
}
