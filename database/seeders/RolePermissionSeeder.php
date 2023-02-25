<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        $arrayOfPermissionNames = [
            'access-dashboard',
            'access-theme-editor',
<<<<<<< HEAD
            'access-parter-maker',
=======
            'access-partner-maker',
>>>>>>> dc90199365855f1f7bba72eb32907cdc42c7ed24
            'view-all-post',
            'create-user',
            'update-user',
            'read-user',
            'delete-user',
            'create-post',
            'update-post',
            'read-post',
            'delete-post',
            'create-tag',
            'update-tag',
            'read-tag',
            'delete-tag',
            'create-category-post',
            'update-category-post',
            'read-category-post',
            'delete-category-post',
            'create-category-menu',
            'update-category-menu',
            'read-category-menu',
            'delete-category-menu',
            'create-menu',
            'update-menu',
            'read-menu',
            'delete-menu',
            'create-sub-menu',
            'update-sub-menu',
            'read-sub-menu',
            'delete-sub-menu',
            'create-banner',
            'update-banner',
            'read-banner',
            'delete-banner',
            'create-role',
            'update-role',
            'read-role',
            'delete-role',
            'create-permission',
            'update-permission',
            'read-permission',
            'delete-permission',
            'create-page',
            'update-page',
            'read-page',
            'delete-page',
            'edit-profile',
            'comment',
        ];
        $permissions = collect($arrayOfPermissionNames)->map(function ($permission) {
            return ['name' => $permission, 'guard_name' => 'web'];
        });

        Permission::insert($permissions->toArray());
        $arrayOfRolesNames = [
            'Super Admin',
            'Admin',
            'Dosen',
            'Mahasiswa',
            'Alumni',
            'Guest'
        ];
        $roles = collect($arrayOfRolesNames)->map(function ($permission) {
            return ['name' => $permission, 'guard_name' => 'web'];
        });

        Role::insert($roles->toArray());
        $permissionsByRole = [
            'Super Admin' => [
                'access-dashboard',
                'access-theme-editor',
                'access-partner-maker',
<<<<<<< HEAD
=======
                'access-comment-manager',
>>>>>>> dc90199365855f1f7bba72eb32907cdc42c7ed24
                'view-all-post',
                'create-user',
                'update-user',
                'read-user',
                'delete-user',
                'create-post',
                'update-post',
                'read-post',
                'delete-post',
                'create-tag',
                'update-tag',
                'read-tag',
                'delete-tag',
                'create-category-post',
                'update-category-post',
                'read-category-post',
                'delete-category-post',
                'create-category-menu',
                'update-category-menu',
                'read-category-menu',
                'delete-category-menu',
                'create-menu',
                'update-menu',
                'read-menu',
                'delete-menu',
                'create-sub-menu',
                'update-sub-menu',
                'read-sub-menu',
                'delete-sub-menu',
                'create-banner',
                'update-banner',
                'read-banner',
                'delete-banner',
                'create-role',
                'update-role',
                'read-role',
                'delete-role',
                'create-permission',
                'update-permission',
                'read-permission',
                'delete-permission',
                'create-page',
                'update-page',
                'read-page',
                'delete-page',
                'edit-profile',
                'comment',
            ],
            'Admin' => [
                'access-dashboard',
                'view-all-post',
                'create-user',
                'update-user',
                'read-user',
                'delete-user',
                'create-post',
                'update-post',
                'read-post',
                'delete-post',
                'create-tag',
                'update-tag',
                'read-tag',
                'delete-tag',
                'create-category-post',
                'update-category-post',
                'read-category-post',
                'delete-category-post',
                'comment'
            ],
            'Dosen' => [
                'access-dashboard',
                'create-post',
                'update-post',
                'read-post',
                'delete-post',
                'edit-profile',
                'comment'
            ],
            'Mahasiswa' => [
                'comment'
            ],
            'Alumni' => [
                'comment'
            ],
            'Guest'=>[

            ]
        ];

        

        foreach ($permissionsByRole as $role => $permissionIds) {
            $role = Role::whereName($role)->first();
            $role->givePermissionTo($permissionIds);
        }
    }
}
