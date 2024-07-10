<?php

namespace Database\Seeders;

use App\Models\MenuGroup;
use Illuminate\Database\Seeder;

class MenuGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // MenuGroup::factory()->count(5)->create();
        MenuGroup::insert(
            [
                [
                    'name' => 'Dashboard',
                    'icon' => 'fas fa-tachometer-alt',
                    'permission_name' => 'dashboard',
                ],
                [
                    'name' => 'Arsip',
                    'icon' => 'fas fa-users',
                    'permission_name' => 'surat.management',
                ],
                [
                    'name' => 'Kategori Surat',
                    'icon' => 'fas fa-bars',
                    'permisison_name' => 'role.permission.management',
                ],
                [
                    'name' => 'About',
                    'icon' => 'fas fa-user-tag',
                    'permisison_name' => 'menu.management',
                ]
            ]
        );
    }
}
