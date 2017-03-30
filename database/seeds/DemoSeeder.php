<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\User;
class DemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    	$faker = Faker::create();
    	for ($i=1; $i <100; $i++) { 
    	       $users[] = ['name'=>$faker->name, 'email'=>$faker->email,'password'=>bcrypt('demo') , 'mobile'=>$faker->phoneNumber, 'is_verified'=>true ];
		}    		
			 
    	foreach ($users as $key => $user) {
    		User::create($user);
    	}

    }
}
