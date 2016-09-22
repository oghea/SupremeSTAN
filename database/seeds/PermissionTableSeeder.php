<?php

use Illuminate\Database\Seeder;
use SupremeSTAN\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = [
            [
                'name' => 'role-list',
                'display_name' => 'Display Role Listing',
                'description' => 'See only Listing Of Role'
            ],
            [
                'name' => 'role-create',
                'display_name' => 'Create Role',
                'description' => 'Create New Role'
            ],
            [
                'name' => 'role-edit',
                'display_name' => 'Edit Role',
                'description' => 'Edit Role'
            ],
            [
                'name' => 'role-delete',
                'display_name' => 'Delete Role',
                'description' => 'Delete Role'
            ],
            [
                'name' => 'permission-list',
                'display_name' => 'Display permission Listing',
                'description' => 'See only Listing Of permission'
            ],
            [
                'name' => 'permission-create',
                'display_name' => 'Create permission',
                'description' => 'Create New permission'
            ],
            [
                'name' => 'permission-edit',
                'display_name' => 'Edit permission',
                'description' => 'Edit permission'
            ],
            [
                'name' => 'permission-delete',
                'display_name' => 'Delete permission',
                'description' => 'Delete permission'
            ],
            [
                'name' => 'profile-list',
                'display_name' => 'Display User Profile List',
                'description' => 'See User Profile List'
            ],
            [
                'name' => 'cek-pembayaran',
                'display_name' => 'cek-pembayaran',
                'description' => 'mengecek pembayaran user'
            ],
            [
                'name' => 'update-pembayaran',
                'display_name' => 'update-pembayaran',
                'description' => 'update-pembayaran'
            ],
            [
                'name' => 'profile-edit',
                'display_name' => 'Editing User Profile ',
                'description' => 'Editing User Profile'
            ],
            [
                'name' => 'profile-delete',
                'display_name' => 'Delete User Profile',
                'description' => 'Delete User Profile'
            ],
            [
                'name' => 'create-post',
                'display_name' => 'create-post',
                'description' => 'membuat post pada blog'
            ],
            [
                'name' => 'delete-post',
                'display_name' => 'delete blog post',
                'description' => 'delete blog post'
            ],
            [
                'name' => 'edit-post',
                'display_name' => 'edit blog post',
                'description' => 'edit blog post'
            ],
            [
                'name' => 'do-tryout',
                'display_name' => 'Melakukan tryout',
                'description' => 'Melakukan tryout'
            ],
            [
                'name' => 'view-nilai',
                'display_name' => 'Melihat list nilai',
                'description' => 'Melihat list nilai'
            ],
            [
                'name' => 'materi-download',
                'display_name' => 'Bisa mendownload materi',
                'description' => 'Bisa mendownload materi'
            ],
            [
                'name' => 'pembahasan-download',
                'display_name' => 'Bisa mendownload pembahasan',
                'description' => 'Bisa mendownload pembahasan'
            ],
            [
                'name' => 'materi-upload',
                'display_name' => 'Bisa menupload materi',
                'description' => 'Bisa menupload materi'
            ],
            [
                'name' => 'materi-update',
                'display_name' => 'Bisa mengupdate materi',
                'description' => 'Bisa mengupdate materi'
            ],
            [
                'name' => 'materi-delete',
                'display_name' => 'Bisa menghapus materi',
                'description' => 'Bisa menghapus materi'
            ],
            [
                'name' => 'pembahasan-upload',
                'display_name' => 'Bisa menupload pembahasan',
                'description' => 'Bisa menupload pembahasan'
            ],
            [
                'name' => 'pembahasan-update',
                'display_name' => 'Bisa mengupdate pembahasan',
                'description' => 'Bisa mengupdate pembahasan'
            ],
            [
                'name' => 'pembahasan-delete',
                'display_name' => 'Bisa menghapus pembahasan',
                'description' => 'Bisa menghapus pembahasan'
            ],
            [
                'name' => 'soal-create',
                'display_name' => 'Bisa membuat soal',
                'description' => 'Bisa membuat soal'
            ],
            [
                'name' => 'soal-view',
                'display_name' => 'Bisa melihat soal',
                'description' => 'Bisa melihat soal'
            ],
            [
                'name' => 'soal-update',
                'display_name' => 'Bisa mengupdate soal',
                'description' => 'Bisa mengupdate soal'
            ],
            [
                'name' => 'soal-delete',
                'display_name' => 'Bisa menghapus soal',
                'description' => 'Bisa menghapus soal'
            ],
            [
                'name' => 'view-analisa',
                'display_name' => 'view analisa',
                'description' => 'bisa melihat hasil analisa tryout'
            ],
        ];

        foreach ($permission as $key => $value) {
            Permission::create($value);
        }
    }
}
