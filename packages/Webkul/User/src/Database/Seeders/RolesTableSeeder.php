<?php

namespace Webkul\User\Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Webkul\User\Models\Role;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('admins')->delete();

        DB::table('roles')->delete();

        DB::table('roles')->insert([
            'id'              => 1,
            'name'            => 'Development',
            'description'     => 'Development area',
            'permission_type' => 'all',
        ]);
    }
}