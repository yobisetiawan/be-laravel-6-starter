<?php

use App\Constants\RoleConst;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = factory(User::class)->create([
            'name' => 'implementer',
            'email' => 'implementer@dev.com'
        ]);

        $user->assignRole(RoleConst::SUPER_ADMIN);
    }
}
