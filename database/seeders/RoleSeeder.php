<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Learnbox\Identities\App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(!Role::all()->count()){
            Role::create([
                'key' => 'admin',
                'name' => 'ادمین'
            ]);

            Role::create([
                'key' => 'user',
                'name' => 'کاربر معمولی'
            ]);

            Role::create([
                'key' => 'vip-user',
                'name' => 'کاربر ویژه'
            ]);
        }
    }
}
