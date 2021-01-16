<?php

use Illuminate\Database\Seeder;

class Loginseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'id'=>2,
            'name'=>'trung',
            'email'=>'trung0910@gmail.com',
            'password'=>bcrypt('trung0910')
        ]);
    }
}
