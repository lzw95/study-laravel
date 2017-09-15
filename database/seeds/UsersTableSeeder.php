<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// times()指定要创建的模型数量
    	$users = factory(User::class)->times(50)->make();
    	User::insert($users->makeVisible(['password', 'remember_token'])->toArray());

    	$user = User::find(1);
    	$user->name = 'Aufree';
    	$user->email = '296324429@qq.com';
    	$user->password = bcrypt('password');
    	$user->is_admin = true;
    	$user->save();
    }
}
