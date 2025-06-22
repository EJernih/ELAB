<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //buat role
        $teknisi = Role::firstorCreate(['name' => 'teknisi']);
        $kalab = Role::firstorCreate(['name' => 'kalab']);
        $kajur = Role::firstorCreate(['name' => 'kajur']);
        $logistik = Role::firstorCreate(['name' => 'logistik']);

        
        //buat izin
        //izin crud user
        Permission::create(['name' => 'create-user']);
        Permission::create(['name' => 'edit-user']);
        Permission::create(['name' => 'delete-user']);
        Permission::create(['name' => 'view-user']);
        
        //izin crud bhp
        Permission::create(['name' => 'create-bhp']);
        Permission::create(['name' => 'edit-bhp']);
        Permission::create(['name' => 'delete-bhp']);
        Permission::create(['name' => 'view-bhp']);

        //izin crud unit
        Permission::create(['name' => 'create-unit']);
        Permission::create(['name' => 'edit-unit']);
        Permission::create(['name' => 'delete-unit']);
        Permission::create(['name' => 'view-unit']);

        //izin crud prodi
        Permission::create(['name' => 'create-prodi']);
        Permission::create(['name' => 'edit-prodi']);
        Permission::create(['name' => 'delete-prodi']);
        Permission::create(['name' => 'view-prodi']);

        //izin crud lab
        Permission::create(['name' => 'create-lab']);
        Permission::create(['name' => 'edit-lab']);
        Permission::create(['name' => 'delete-lab']);
        Permission::create(['name' => 'view-lab']);

        //izin crud request
        Permission::create(['name' => 'create-request']);
        Permission::create(['name' => 'edit-request']);
        Permission::create(['name' => 'delete-request']);
        Permission::create(['name' => 'view-request']);

        //izin crud detail request
        Permission::create(['name' => 'create-detail-request']);
        Permission::create(['name' => 'edit-detail-request']);
        Permission::create(['name' => 'delete-detail-request']);
        Permission::create(['name' => 'view-detail-request']);

        //memberi permission kepada role
        $teknisi->givePermissionTo(['create-bhp', 
                                    'edit-bhp', 
                                    'delete-bhp', 
                                    'view-bhp',
                                    'create-unit', 
                                    'edit-unit', 
                                    'delete-unit', 
                                    'view-unit',
                                    'create-prodi', 
                                    'edit-prodi', 
                                    'delete-prodi', 
                                    'view-prodi',
                                    'create-lab', 
                                    'edit-lab', 
                                    'delete-lab', 
                                    'view-lab',
                                    'create-request', 
                                    'edit-request', 
                                    'delete-request', 
                                    'view-request',
                                    'create-detail-request', 
                                    'edit-detail-request', 
                                    'delete-detail-request', 
                                    'view-detail-request',
                                    ]);
        $kalab->givePermissionTo(['view-bhp']);





    }
}