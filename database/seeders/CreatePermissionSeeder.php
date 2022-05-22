<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class CreatePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name'=>'show categories']);
        Permission::create(['name'=>'add categories']);
        Permission::create(['name'=>'edit categories']);
        Permission::create(['name'=>'delete categories']);

    }
}
