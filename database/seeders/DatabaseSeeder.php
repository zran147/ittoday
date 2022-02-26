<?php

namespace Database\Seeders;


use App\Models\User;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create([
            'name' => 'admin'
        ]);
        Role::create([
            'name' => 'user'
        ]);
        Role::create([
            'name' => 'kestary'
        ]);
        Role::create([
            'name' => 'event'
        ]);
        Role::create([
            'name' => 'kompetisi'
        ]);
        $showrole = Permission::create([
            'name' => 'show-role'
        ]);
        $addrole = Permission::create([
            'name' => 'add-role'
        ]);
        $editrole = Permission::create([
            'name' => 'edit-role'
        ]);
        $deleterole = Permission::create([
            'name' => 'delete-role'
        ]);
        $addpermission = Permission::create([
            'name' => 'add-permission'
        ]);
        $editpermission = Permission::create([
            'name' => 'edit-permission'
        ]);
        $deletepermission = Permission::create([
            'name' => 'delete-permission'
        ]);
        $edituser = Permission::create([
            'name' => 'edit-user'
        ]);
        $giveroleuser = Permission::create([
            'name' => 'giverole-user'
        ]);
        $givepermissionuser = Permission::create([
            'name' => 'givepermission-user'
        ]);
        $blokuser = Permission::create([
            'name' => 'blok-user'
        ]);
        $deleteuser = Permission::create([
            'name' => 'delete-user'
        ]);
        $addevent = Permission::create([
            'name' => 'add-event'
        ]);
        $editevent = Permission::create([
            'name' => 'edit-event'
        ]);
        $deleteevent = Permission::create([
            'name' => 'delete-event'
        ]);
        $admin->givePermissionTo(['add-role', 'edit-role', 'delete-role', 'add-permission', 'edit-permission', 'delete-permission']);

        // ModelsCategory::create([
        //     'name_category' => 'Webinar',
        //     'slug_category' => 'Webinar',
        //     'active' => "1"
        // ]);
        $user = User::create([
            'name' => 'lintang lazuardi',
            'password' => bcrypt('linlaz11'),
            'email' => 'lintanglazuardi11@gmail.com',
            'wa_user' => '0895708134567'
        ]);
        $user->assignRole('admin');
    }
}
