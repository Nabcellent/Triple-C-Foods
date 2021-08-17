<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Schema::disableForeignKeyConstraints();
        Permission::truncate();
        Role::truncate();
        User::truncate();
        Schema::enableForeignKeyConstraints();

        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'create product']);
        Permission::create(['name' => 'edit product']);
        Permission::create(['name' => 'update product']);
        Permission::create(['name' => 'delete product']);
        Permission::create(['name' => 'create order']);
        Permission::create(['name' => 'edit order']);
        Permission::create(['name' => 'delete order']);
        Permission::create(['name' => 'update order']);

        // create roles and assign existing permissions
        $role = Role::create(['name' => 'super']);
        $role1 = Role::create(['name' => 'customer']);
        $role1->givePermissionTo('create order');

        $role2 = Role::create(['name' => 'admin']);
        $role2->givePermissionTo('create product');
        $role2->givePermissionTo('edit product');
        $role2->givePermissionTo('update product');
        $role2->givePermissionTo('delete product');
        $role2->givePermissionTo('edit order');
        $role2->givePermissionTo('update order');

        // create Super Admin
        User::create([
            'is_admin' => 7,
            'name' => 'Re.d_beard',
            'email' => 'michael.nabangi@strathmore.edu',
            'password' => Hash::make('M1gu3l.!'),
        ])->assignRole($role);

        // create a demo user
        User::create([
            'name' => 'Example User',
            'email' => 'test@example.com',// factory default password is 'mike'
            'password' => Hash::make('mike'),
        ])->assignRole($role);
    }
}
