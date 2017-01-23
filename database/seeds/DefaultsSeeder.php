<?php

use Illuminate\Database\Seeder;

class DefaultsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$connection = \Config::get('database.default');
        
        \DB::statement('TRUNCATE TABLE roles  CASCADE');

        $data = [
            [
                'name' => 'SuperAdmin',
                'label' => 'superadmin'
            ],[
                'name' => 'Admin',
                'label' => 'admin'
            ]
        ];

        foreach ($data as $item) {
            \DB::table('roles')->insert(
                [
                    'name' => $item['name'],
                    'label' => $item['label'],
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now()
                ]
            );
        }

        if ($connection=="pgsql") {
            \DB::statement("SELECT pg_catalog.setval(pg_get_serial_sequence('roles', 'id'), "
	            . "MAX(id)) FROM roles");
        }

        \DB::table('users')->delete();

        \DB::statement('ALTER SEQUENCE users_id_seq RESTART WITH 1;');

        $role = \DB::table('roles')->where('label', 'admin')->first();

        \DB::table('users')->insert([
            [
                'name' => 'SuperAdmin',
                'username' => 'superadmin',
                'email' => 'superadmin@spam4.me',
                'password' => bcrypt('123456'),
                'birth' => \Carbon\Carbon::now(),
                'gender' => 'male',
                'photo' => NULL,
                'phone' => '085645690124',
                'telp' => '-',
                'last_login' => NULL,
                'active' => 1,
                'created_by' => 'system',
                'role_id' => $role->id,

                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]
        ]);

        \DB::statement("SELECT pg_catalog.setval(pg_get_serial_sequence('users', 'id'), "
            . "MAX(id)) FROM users");

    }
}
