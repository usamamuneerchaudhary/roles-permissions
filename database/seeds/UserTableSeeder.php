<?php

use App\Permission;
use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

	    $dev_role = Role::where('slug','developer')->first();
	    $manager_role = Role::where('slug', 'manager')->first();
	    $dev_perm = Permission::where('slug','create-tasks')->first();
	    $manager_perm = Permission::where('slug','edit-tasks')->first();

	    $developer = new User();
	    $developer->name = 'Usama Muneer';
	    $developer->email = 'usama@protech.studio';
	    $developer->password = bcrypt('secret');
	    $developer->save();
	    $developer->roles()->attach($dev_role);
	    $developer->permissions()->attach($dev_perm);


	    $manager = new User();
	    $manager->name = 'Maavuz Saif';
	    $manager->email = 'maavuz@protech.studio';
	    $manager->password = bcrypt('secret');
	    $manager->save();
	    $manager->roles()->attach($manager_role);
	    $manager->permissions()->attach($manager_perm);
    }
}
