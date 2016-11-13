<?php

use Illuminate\Database\Seeder;
use SupremeSTAN\Role;
use SupremeSTAN\User;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('roles')->delete();

        $owner = new Role();
        $owner->name = 'owner';
        $owner->display_name = 'Pemilik SupremeSTAN';
        $owner->description = 'pemegang hak akses penuh';
        $owner->save();
        $owner->attachPermissions(['1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18',
            '19','20','21','22','23','24','25','26','27','28','29','30','31','32','33','34']);

        $superadmin = new Role();
        $superadmin->name = 'superadmin';
        $superadmin->display_name = 'superadmin';
        $superadmin->description = 'admin tertinggi';
        $superadmin->save();
        $superadmin->attachPermissions(['1','2','3','4','9','10','11','12','13','14','15','16','17','18',
            '19','20','21','22','23','24','25','26','27','28','29','30','31','32','33','34']);

        $curriculum = new Role();
        $curriculum->name = 'curriculum';
        $curriculum->display_name = 'curriculum admin';
        $curriculum->description = 'mengatur materi pembahasan dan soal';
        $curriculum->save();
        $curriculum->attachPermissions(['18',
            '19','20','21','22','23','24','25','26','27','28','29','30']);

        $finance = new Role();
        $finance->name = 'finance';
        $finance->display_name = 'admin finance';
        $finance->description = 'mengatur keuangan user supreme';
        $finance->save();
        $finance->attachPermissions(['10','11','12']);

        $admin_account = new Role();
        $admin_account->name = 'admin_account';
        $admin_account->display_name = 'admin akun';
        $admin_account->description = 'mengatur akun user';
        $admin_account->save();
        $admin_account->attachPermissions(['9','12','13']);

        $admin_content = new Role();
        $admin_content->name = 'admin_content';
        $admin_content->display_name = 'admin content';
        $admin_content->description = 'mengatur content supremestan.com';
        $admin_content->save();
        $admin_content->attachPermissions(['14','15','16']);

        $siswa = new Role();
        $siswa->name = 'bimbel_premium';
        $siswa->display_name = 'siswa bimbel';
        $siswa->description = 'siswa bimbel Premium SupremeSTAN';
        $siswa->save();
        $siswa->attachPermissions(['10','17','18',
            '19','20','28','31','32','33']);

        $siswa_online = new Role();
        $siswa_online->name = 'bimbel_online';
        $siswa_online->display_name = 'bimbel online';
        $siswa_online->description = 'siswa bimbel online SupremeSTAN';
        $siswa_online->save();
        $siswa_online->attachPermissions(['10','17','18',
            '19','20','28','31','32','33']);

        $siswa_tryout = new Role();
        $siswa_tryout->name = 'siswa_tryout';
        $siswa_tryout->display_name = 'siswa tryout';
        $siswa_tryout->description = 'siswa tryout';
        $siswa_tryout->save();
        $siswa_tryout->attachPermissions(['17','18','20','31','32','33']);

        $free = new Role();
        $free->name = 'free_member';
        $free->display_name = 'Free User Account';
        $free->description = 'free user account';
        $free->save();
        $free->attachPermissions(['17','18','20','31','33']);

        $user_owner =  new User();
        $user_owner->name = 'owner';
        $user_owner->email = 'widodo@supremestan.com';
        $user_owner->password = bcrypt('sayaowner');
        $user_owner->verified = 1;
        $user_owner->save();
        $user_owner->attachRole($owner);

        $user_superadmin =  new User();
        $user_superadmin->name = 'superadmin';
        $user_superadmin->email = 'super@supremestan.com';
        $user_superadmin->password = bcrypt('djarum');
        $user_superadmin->verified = 1;
        $user_superadmin->save();
        $user_superadmin->attachRole($superadmin);

        $user_curriculum =  new User();
        $user_curriculum->name = 'curriculum_admin';
        $user_curriculum->email = 'curriculum@supremestan.com';
        $user_curriculum->password = bcrypt('password');
        $user_curriculum->verified = 1;
        $user_curriculum->save();
        $user_curriculum->attachRole($curriculum);

        $user_finance =  new User();
        $user_finance->name = 'finance_admin';
        $user_finance->email = 'finance@supremestan.com';
        $user_finance->password = bcrypt('password');
        $user_finance->verified = 1;
        $user_finance->save();
        $user_finance->attachRole($finance);

        $user_account =  new User();
        $user_account->name = 'account_admin';
        $user_account->email = 'account@supremestan.com';
        $user_account->password = bcrypt('password');
        $user_account->verified = 1;
        $user_account->save();
        $user_account->attachRole($admin_account);

        $user_content =  new User();
        $user_content->name = 'content_admin';
        $user_content->email = 'content@supremestan.com';
        $user_content->password = bcrypt('password');
        $user_content->verified = 1;
        $user_content->save();
        $user_content->attachRole($admin_content);

    }
}
