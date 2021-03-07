<?php

use App\Model\Permission;
use App\Model\Role;
use App\Model\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $dev_permission = Permission::where('slug','create-tasks')->first();
		$manager_permission = Permission::where('slug', 'edit-users')->first();

		//RoleTableSeeder.php
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

		$dev_role = Role::where('slug','developer')->first();
		$manager_role = Role::where('slug', 'manager')->first();

		$createTasks = new Permission();
		$createTasks->slug = 'create-tasks';
		$createTasks->name = 'Create Tasks';
		$createTasks->save();
		$createTasks->roles()->attach($dev_role);

		$editUsers = new Permission();
		$editUsers->slug = 'edit-users';
		$editUsers->name = 'Edit Users';
		$editUsers->save();
		$editUsers->roles()->attach($manager_role);

		$dev_role = Role::where('slug','developer')->first();
		$manager_role = Role::where('slug', 'manager')->first();
		$dev_perm = Permission::where('slug','create-tasks')->first();
		$manager_perm = Permission::where('slug','edit-users')->first();

		$developer = new User();
		$developer->name = 'Nguyen van hoang';
		$developer->email = 'test1@gmail.com';
		$developer->password = bcrypt('12345678');
		$developer->save();
		$developer->roles()->attach($dev_role);
		$developer->permissions()->attach($dev_perm);

		$manager = new User();
		$manager->name = 'Do van anh';
		$manager->email = 'test2@gmail.com';
		$manager->password = bcrypt('12345678');
		$manager->save();
		$manager->roles()->attach($manager_role);
		$manager->permissions()->attach($manager_perm);

		$manager = new User();
		$manager->name = 'Nguyen Hoang Anh';
		$manager->email = 'test3@gmail.com';
		$manager->password = bcrypt('12345678');
		$manager->isAdmin = true;
		$manager->save();
		$manager->roles()->attach($manager_role);
		$manager->permissions()->attach($manager_perm);
    }
}
