<?php

namespace Database\Seeders;

use App\Models\MenuItem;
use Illuminate\Database\Seeder;

class MenuItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // MenuItem::factory()->count(10)->create();
        MenuItem::insert(
            [
                [
                    'name' => 'About',
                    'route' => 'dashboard',
                    'permission_name' => 'dashboard',
                    'menu_group_id' => 1,
                ],
                [
                    'name' => 'Arsip Surat',
                    'route' => 'surat-management/surat',
                    'permission_name' => 'surat.index',
                    'menu_group_id' => 2,
                ],
                [
                    'name' => 'Kategori Surat',
                    'route' => 'kategori-surat/kategori',
                    'permission_name' => 'kategori.index',
                    'menu_group_id' => 3,
                ],
                // [
                //     'name' => 'About',
                //     'route' => 'about-management/about',
                //     'permission_name' => 'about.index',
                //     'menu_group_id' => 4,
                // ],
            ]
        );
    }
}
