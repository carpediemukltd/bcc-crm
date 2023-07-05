<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
       
        Permission::create(['name' => 'create admin']);
        Permission::create(['name' => 'edit admin']);
        Permission::create(['name' => 'delete admin']);
        Permission::create(['name' => 'list admin']);
        
        Permission::create(['name' => 'create owner']);
        Permission::create(['name' => 'edit owner']);
        Permission::create(['name' => 'delete owner']);
        Permission::create(['name' => 'list owner']);

        Permission::create(['name' => 'create user']);
        Permission::create(['name' => 'edit user']);
        Permission::create(['name' => 'delete user']);
        Permission::create(['name' => 'list user']);

   
        // creating roles and assigning permissions
        $role = Role::create(['name' => 'superadmin']);
        $role->givePermissionTo(Permission::all());

        
        $role = Role::create(['name' => 'admin'])
            ->givePermissionTo(['create owner','edit owner','delete owner','list owner','create user','edit user','delete user','list user']);

        $role = Role::create(['name' => 'owner']);
        $role->givePermissionTo(['create user','edit user','delete user','list user']);

        $role = Role::create(['name' => 'user']);
    }
}