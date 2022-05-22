<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class CreateAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminUser = User::create([
            'email'=>'newyorksquirrel@gmail.com',
            'name'=>'Admin',
            'password'=> Hash::make('1234567890'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);
        Role::create([
            'name'=>'admin',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        $adminUser->assignRole('admin');
    }


}
