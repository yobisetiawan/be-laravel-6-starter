<?php

namespace Database\Seeds\Prod;

use App\Constants\RoleConst;
use Illuminate\Database\Seeder; 
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {  
        $this->insertRole();
    }

    private function insertRole()
    {
        $roles = [
            [RoleConst::SUPER_ADMIN],
        ];
        
        foreach ($roles as $role) {
            Role::create([
                'name' => $role[0],
            ]);
        }
    }
}
