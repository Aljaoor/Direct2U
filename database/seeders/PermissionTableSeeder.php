<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [

            'users management',

            'settings management',

            'role-list',

            'role-create',

            'role-edit',

            'role-delete',

            'messages',

            'restaurants management',

            'orders management'

        ];

        foreach ($permissions as $permission) {

            Permission::create(['name' => $permission]);

        }
    }
}
