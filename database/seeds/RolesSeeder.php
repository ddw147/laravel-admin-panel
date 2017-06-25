<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Role;
use App\Permission;

class RolesSeeder extends Seeder
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
        Role::truncate();
        Permission::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $roles= [
                    ['name'=>'owner','display_name'=>'Project Owner','description'=>'manage all user'],
                    ['name'=>'moderator','display_name'=>'Project moderator','description'=>'manage all user'],
                    ['name'=>'manager','display_name'=>'Project manager','description'=>'manage all user'],
                ];

        foreach ($roles as $key => $role) {
            Role::create($role);
        }
        

        $owner=Role::findorfail(1);
        $user= User::findorfail(1);
        $user->attachRole($owner);



        $permissions=[
                        ['name'=>'create-user','display_name'=>'create users','description'=>'create new verified users'],
                        ['name'=>'edit-user','display_name'=>'edit users','description'=>'edit all users'],
                        ['name'=>'lock-user','display_name'=>'block users','description'=>'can lock users'],
                        ['name'=>'authorise-user','display_name'=>'authorise users','description'=>'can give roles and permissions to users']
                     ];

        foreach ($permissions as $key => $permission) {
                $newPermission= Permission::create($permission);
                $owner->attachPermission($newPermission);
        }
    }
}
