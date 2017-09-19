<?php

use App\Permission;
use App\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    $dev_permission = Permission::where('slug','create-tasks')->first();
	    $manager_permission = Permission::where('slug', 'edit-users')->first();

	    $dev_role = new Role();
	    $dev_role->slug = 'developer';
	    $dev_role->name = 'Front-end Developer';
	    $dev_role->save();
	    $dev_role->permissions()->attach($dev_permission);

	    $manager_role = new Role();
	    $manager_role->slug = 'manager';
	    $manager_role->name = 'Assistant Manager';
	    $manager_role->save();
	    $manager_role->permissions()->attach($manager_permission);
    }
}
