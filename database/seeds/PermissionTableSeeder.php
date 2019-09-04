<?php


use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;


class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $permissions = [
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'member-list',
           'member-create',
           'member-edit',
           'member-delete',
           'genre-list',
           'genre-create',
           'genre-edit',
           'genre-delete',
           'book-list',
           'book-create',
           'book-edit',
           'book-delete',
        ];


        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}