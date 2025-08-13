<?php namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class PermissionsSeedor extends Seeder {
    public function run(): void {
        Permission::create(["name" => "Show roles list"]);
        Permission::create(["name" => "Show Students list"]);
        Permission::create(["name" => "Show Teachers list"]);
        Permission::create(["name" => "Show Admins list"]);
        Permission::create(["name" => "Show courses list"]);
        Permission::create(["name" => "Show permissions list"]);
        Permission::create(["name" => "login"]);
        Permission::create(["name" => ""]);
    }
}
