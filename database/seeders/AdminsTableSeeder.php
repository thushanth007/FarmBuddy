<?php
namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use jeremykenedy\LaravelRoles\Models\Permission;
use jeremykenedy\LaravelRoles\Models\Role;


class AdminsTableSeeder extends Seeder
{

    public function run()
    {
        $userRole = Role::where('name', '=', 'User')->first();
        $adminRole = Role::where('name', '=', 'Admin')->first();
        $permissions = Permission::all();

        if (Admin::where('email', '=', 'admin@farmbuddy.lk')->first() === null) {
            $newUser = Admin::create([
                'name'     => 'Master Admin',
                'email'    => 'admin@farmbuddy.lk',
                'password' => bcrypt('admin'),
                'image' => 'profile.jpg',
                'status' => '1',
            ]);

            $newUser->attachRole($adminRole);
            foreach ($permissions as $permission) {
                $newUser->attachPermission($permission);
            }
        }

        if (Admin::where('email', '=', 'admin@farmbuddy.lk')->first() === null) {
            $newUser = Admin::create([
                'name'     => 'Editor',
                'email'    => 'admin@farmbuddy.lk',
                'password' => bcrypt('editor'),
                'image' => 'profile.jpg',
                'status' => '1',
            ]);

            $newUser->attachRole($userRole);
        }
    }
}
