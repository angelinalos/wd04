<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name'=>'admin']);
        Role::create(['name'=>'moderator']);
        Role::create(['name'=>'seo']);

        $user = User::where('email', 'web@gmail.com')->first();
        $user->assignRole($role);
    }
}
