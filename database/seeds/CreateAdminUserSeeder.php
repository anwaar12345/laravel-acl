<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;
class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $user = User::create([
        	'name' => 'Syed Anwar Ahmed shah', 
        	'email' => 'shah@gmail.com',
        	'password' => Hash::make('shahji444')
        ]);
  
        
        Role::create(['name' => 'Admin']);
        $role = Role::where('name' , 'Admin')->first();
   
        $permissions = Permission::pluck('id')->all();
  
        $role->syncPermissions($permissions);
   
        $user->assignRole([$role->id]);



    }
}
