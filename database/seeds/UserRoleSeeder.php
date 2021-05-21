<?php

use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $i = 0;
        $users = \App\User::select('id','name')->get();
//        dd($users);
        foreach ($users as $user) {
            \Illuminate\Support\Facades\DB::table('user_roles')->insert( [
                ['user_id'=>$user->id,'role_id' => rand(1,2)]
            ]);

//            dd("done seeding");
        }
        dd("done seeding");
    }
}
