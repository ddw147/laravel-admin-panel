<?php


use Illuminate\Database\Seeder;
use App\User;

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
    	$users = [
    				['name'=>'Dhiraj Wakchaure', 'email'=>'ddw147@gmail.com','password'=>bcrypt('demo') , 'mobile'=>'8275466726','otp'=>'','is_verified'=>true ],
    				['name'=>'Demo', 'email'=>'demo@gmail.com','password'=>bcrypt('demo') , 'mobile'=>'8275466725','otp'=>'','is_verified'=>true ],
    				['name'=>'test', 'email'=>'test@gmail.com','password'=>bcrypt('demo') , 'mobile'=>'8275466724','otp'=>'','is_verified'=>true ]
    			 ];

    	User::truncate();
    	
    	foreach ($users as $key => $user) {
    		
    		User::create($user);
    	}



    }
}
