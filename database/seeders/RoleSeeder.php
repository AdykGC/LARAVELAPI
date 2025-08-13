<?php namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder {
    public function run(): void {
        $R1 = Role::firstOrCreate(['guard_name' => 'sanctum', 'name' => 'Website Admin']);
        $R2 = Role::firstOrCreate(['guard_name' => 'sanctum', 'name' => "Teacher"]);
        $R3 = Role::firstOrCreate(['guard_name' => 'sanctum', 'name' => "Student"]);

        Permission::create(["name" => "View | ALL"]);
        Permission::create(["name" => "EDIT | ALL"]);
        Permission::create(["name" => "A"]);
        Permission::create(["name" => "B"]);

        $USR1 = User::firstOrCreate([
            "full_name"=> "Junior Admin RIKS",
            "university_email" => "Mandarin@Carbon.drink",
            "email" => "Mandarin@Carbonated.drink",
            "password" => Hash::make("Qaz123edc"),
        ]);
        $USR1->assignRole($R1);

        $USR2 = User::firstOrCreate([
            "full_name"=> "Lester",
            "university_email" => "Hack@gta.drink",
            "email" => "Farin@coffee.drink",
            "password" => Hash::make("Qaz123edc"),
        ]);
        $USR2->assignRole($R2);

        $USR3 = User::firstOrCreate([
            "full_name"=> "Adidas",
            "university_email" => "Adidas@gmail.com",
            "email" => "Mand@Adid.com",
            "password" => Hash::make("Qaz123edc"),
        ]);
        $USR3->assignRole($R3);
        
        
        $R1->syncPermissions(['View | ALL', 'EDIT | ALL']);
        $R2->syncPermissions(['A']);
        $R3->syncPermissions(['B']);
    }
}
