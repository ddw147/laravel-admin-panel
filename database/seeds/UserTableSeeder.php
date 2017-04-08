<?php


use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\Permission;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::statement('truncate table permission_role');
        DB::statement('truncate table role_user');
        DB::statement('truncate table oauth_tokens');
        Role::truncate();
        Permission::truncate();
        User::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    	$users = [
    				['name'=>'Dhiraj Wakchaure', 'email'=>'ddw147@gmail.com','password'=>bcrypt('demo') , 'mobile'=>'8275466726','is_verified'=>true ],
    				['name'=>'Demo', 'email'=>'demo@gmail.com','password'=>bcrypt('demo') , 'mobile'=>'8275466725','is_verified'=>true ],
    				['name'=>'test', 'email'=>'test@gmail.com','password'=>bcrypt('demo') , 'mobile'=>'8275466724','is_verified'=>true ]
    			 ];

    	
    	
    	foreach ($users as $key => $user) {
    		
    		User::create($user);
    	}
        


    }
}
