<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'dashboard']);
        Permission::create(['name' => 'surat.management']);
        Permission::create(['name' => 'kategori.surat.management']);
        Permission::create(['name' => 'about.management']);
        //user
        Permission::create(['name' => 'surat.index']);
        Permission::create(['name' => 'surat.create']);
        Permission::create(['name' => 'surat.edit']);
        Permission::create(['name' => 'surat.destroy']);
        Permission::create(['name' => 'surat.show']);
        Permission::create(['name' => 'surat.import']);
        Permission::create(['name' => 'surat.export']);

        //kategori
        Permission::create(['name' => 'kategori.index']);
        Permission::create(['name' => 'kategori.create']);
        Permission::create(['name' => 'kategori.edit']);
        Permission::create(['name' => 'kategori.destroy']);
        Permission::create(['name' => 'kategori.import']);
        Permission::create(['name' => 'kategori.export']);

        //about
        Permission::create(['name' => 'about.index']);
        Permission::create(['name' => 'about.create']);
        Permission::create(['name' => 'about.edit']);
        Permission::create(['name' => 'about.destroy']);

        // create roles
        $roleUser = Role::create(['name' => 'user']);
        $roleUser->givePermissionTo([
            'dashboard',
            'surat.management',
            'surat.index',
        ]);

        // create Super Admin
        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());

        //assign user id 1 ke super admin
        $user = User::find(1);
        $user->assignRole('super-admin');
        $user = User::find(2);
        $user->assignRole('user');
    }
}
