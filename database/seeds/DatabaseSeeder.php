<?php

use Illuminate\Database\Seeder;
use App\Modules\Roles\Models\Modules;
use App\Modules\Roles\Models\Permission;
use App\Modules\Roles\Models\Roles;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Roles::create([
            'id'         => 1,
            'title'      => 'Администратор',
            'active'     => 1
        ]);

        DB::table('admins')->insert(
            [
                'role_id'   => 1,
                'name'      => 'admin',
                'email'     => 'admin@admin.ru',
                'password'  =>  bcrypt('admin'),
                'created_at'=>time()
            ]
        );

       $this->seedModules();

       $modules = Modules::all();

        foreach ($modules as $module) {
            $permissionEntity               = new Permission();
            $permissionEntity->module_id    = $module->id;
            $permissionEntity->read         = 1;
            $permissionEntity->create       = 1;
            $permissionEntity->publish      = 1;
            $permissionEntity->update       = 1;
            $permissionEntity->delete       = 1;

            $role->permissions()->save($permissionEntity);
        }

       /* DB::table('users')->insert(
            array(
                'name'          => 'user',
                'email'         => 'user@user.ru',
                'password'      =>  bcrypt('user'),
                'created_at'    =>time()
            )
        );*/
    }

    public function seedModules(){


        $module = Modules::where('slug', 'images')->first();
        //$module = Modules::where('slug', 'files')->first();
        if (!$module) {
            Modules::create([
                'slug'  => 'images',
                'title' => 'Изображения'
            ]);
        } elseif ($module->title != 'Изображения') {
            Modules::where('slug', 'images')->update([
                'title' => 'Изображения'
            ]);
        }

        if (!$module) {
            Modules::create([
                'slug'  => 'files',
                'title' => 'Файлы'
            ]);
        } elseif ($module->title != 'Файлы') {
            Modules::where('slug', 'files')->update([
                'title' => 'Изображения'
            ]);
        }

        foreach (config('modules.items') as $key => $value){
            $condition = (
                isset($value['settings']) &&
                isset($value['menu']) &&
                isset($value['settings']['in_roles']) &&
                $value['settings']['in_roles'] = 1
            );

            if($condition){
                $items  = config('modules.items.' .$key.'.menu.items');

                foreach ($items as $item) {
                    $slug   = $item['slug'];
                    $title  = $item['title'];
                    $module = Modules::where('slug', $slug)->first();

                    if (!$module) {
                        Modules::create([
                            'slug' => $slug,
                            'title' => $title
                        ]);
                    } elseif ($module->title != $title) {
                        Modules::where('slug', $slug)->update([
                            'title' => $title
                        ]);
                    }
                }
            }
        }
    }
}
