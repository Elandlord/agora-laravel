<?php

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
        // allow
        Bouncer::allow('admin')->to('users_manage');
        Bouncer::allow('mentor')->to('download_files');
    }
}
