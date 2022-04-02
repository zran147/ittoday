<?php

namespace Database\Seeders;


use App\Models\User;
use App\Models\Competition;
use Illuminate\Support\Str;
use App\Models\TimCompetition;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create('id_ID');
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
            'wa_user' => '0895708134567',
            'email_verified_at' => '2022-04-01 15:09:53'
        ]);
        $user->assignRole('admin');

        $competition = Competition::create([
            'name_competition' => 'Hack Today',
            'slug_competition' => 'hack-today',
            'finish_registrasi_competition' => '2022-04-01',
            'rule_book_competition' => 'www.lintech.com',
            'active' => 'published',
        ]);
        TimCompetition::create([
            'code_uniq_tim' => Str::uuid(),
            'name_tim' => 'lintech',
            'level_tim' => 'kuliah',
            'institusi_name_tim' => 'IPB',
            'email_tim' => 'lintech@gmail.com',
            'username_telegram_tim' => 'lintech',
            'no_hp_tim' => $faker->randomDigit(),
            'registrant_id' => '1',
            'competition_id' => '1',
        ]);
        TimCompetition::create([
            'code_uniq_tim' => Str::uuid(),
            'name_tim' => 'linlaz11',
            'level_tim' => 'sma',
            'institusi_name_tim' => 'man1',
            'email_tim' => 'linlaz11@gmail.com',
            'username_telegram_tim' => 'linlaz',
            'no_hp_tim' => $faker->randomDigit(),
            'registrant_id' => '1',
            'competition_id' => '1',
        ]);
    }
}
