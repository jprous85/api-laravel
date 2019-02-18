<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'          => 'admin',
            'last_name'     => null,
            'date_of_birth' => null,
            'email'         => 'admin@admin.com',
            'password'      => bcrypt('1234567'),
            'image'         => 'default-user.png',
            'created_at'    => \Carbon\Carbon::now(),
            'updated_at'    => \Carbon\Carbon::now(),
        ]);

        for ($i = 1; $i < 20; $i++) {

            $url = "https://randomuser.me/api?nat=es";
            $contingut = file_get_contents($url);
            $obj = json_decode($contingut);

            foreach ($obj->results as $item) {

                DB::table('users')->insert([
                    'name'          => $item->name->first,
                    'last_name'     => $item->name->last,
                    'date_of_birth' => explode("T", $item->dob->date)[0],
                    'email'         => $item->name->first.".".$item->name->last.".".$i."@apirest.com",
                    'password'      => bcrypt(1234567),
                    'image'         => null,
                    'created_at'    => \Carbon\Carbon::now(),
                    'updated_at'    => \Carbon\Carbon::now(),
                ]);

            }
        }
    }
}
