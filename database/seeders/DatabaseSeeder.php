<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use App\Models\Competition;
use App\Models\RegistrantCompetition;
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
        $dashboardmenu = Permission::create([
            'name' => 'dashboard-menu'
        ]);
        $actionevent = Permission::create([
            'name' => 'action-event'
        ]);
        $actioncompetition = Permission::create([
            'name' => 'action-competition'
        ]);
        $admin->givePermissionTo(['action-event', 'action-competition', 'add-role', 'edit-role', 'delete-role', 'add-permission', 'edit-permission', 'delete-permission', 'dashboard-menu']);

        Category::create([
            'name_category' => 'Seminar Nasional',
            'slug_category' => 'seminar-nasional',
        ]);
        Category::create([
            'name_category' => 'Workshop',
            'slug_category' => 'workshop',
        ]);
        Category::create([
            'name_category' => 'Seminar Komunitas',
            'slug_category' => 'seminar-komunitas',
        ]);

        $user1 = User::create([
            'name' => 'lintang lazuardi',
            'password' => bcrypt('linlaz11'),
            'email' => 'lintanglazuardi11@gmail.com',
            'wa_user' => '0895708134567',
            'email_verified_at' => '2022-04-01 15:09:53'
        ]);
        $user1->assignRole('admin');

        $user2 = User::create([
            'name' => 'lintang lazuardi',
            'password' => bcrypt('linlaz11'),
            'email' => 'lazuardilintang@apps.ipb.ac.id',
            'wa_user' => '089570813456',
            'email_verified_at' => '2022-04-01 15:09:53'
        ]);
        $user2->assignRole('user');

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
            'participant' => 3,
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
            'participant' => 3,
        ]);
        RegistrantCompetition::create([
            'name_registrant_competitions' => 'linlaz',
            'provinsi_registrant_competitions' => 'jawa timur',
            'tim_id' => '2',
            'team_leader_registrant_competitions' => '1',
        ]);
        RegistrantCompetition::create([
            'name_registrant_competitions' => 'lintang',
            'provinsi_registrant_competitions' => 'jawa timur',
            'tim_id' => '2'
        ]);
        RegistrantCompetition::create([
            'name_registrant_competitions' => 'linlaz',
            'provinsi_registrant_competitions' => 'jawa timur',
            'tim_id' => '1',
            'team_leader_registrant_competitions' => '1',
        ]);
        RegistrantCompetition::create([
            'name_registrant_competitions' => 'lintang',
            'provinsi_registrant_competitions' => 'jawa timur',
            'tim_id' => '1'
        ]);
    }
}
