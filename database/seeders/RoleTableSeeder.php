<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $admin=Role::create([
            'name'=>'admin'

        ]);

        $user=Role::create([
            'name'=>'user'

        ]);

        $suspend=Role::create([
            'name'=>'suspend'

        ]);



    }
}
