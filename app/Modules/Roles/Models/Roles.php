<?php
namespace App\Modules\Roles\Models;

use App\Models\Model;
use App\Modules\Admin\Models\Admin;
use App\Modules\Admins\Models\Admins;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Notifications\Notifiable;

class Roles extends Model
{
    use Notifiable, Sortable;

    public $timestamps = false;

    public function scopeOrder($query)
    {
        return $query;
    }

    public function saveData(array $data)
    {
        foreach ($data['permissions'] as $moduleId => $permission) {
            $permissionEntity               = new Permission();
            $permissionEntity->module_id    = $moduleId;
            $permissionEntity->read         = isset($permission['read'])?$permission['read']:1;
            $permissionEntity->create       = isset($permission['create'])?$permission['create']:1;
            $permissionEntity->publish      = isset($permission['publish'])?$permission['publish']:1;
            $permissionEntity->update       = isset($permission['update'])?$permission['update']:1;
            $permissionEntity->delete       = isset($permission['delete'])?$permission['delete']:1;

            $this->permissions()->save($permissionEntity);
        }
    }

    public function updateData(array $data)
    {
        $this->title    = $data['title'];
        $this->active   = $data['active'];
        $permissions    = $this->permissions()->get();

        if(!$permissions->isEmpty()){
            foreach ($permissions as $permission){

                $read    = isset($data['permissions'][$permission->module_id]['read'])?
                           $data['permissions'][$permission->module_id]['read']:
                           1;
                $create  = isset($data['permissions'][$permission->module_id]['create'])?
                           $data['permissions'][$permission->module_id]['create']:
                           1;
                $publish = isset($data['permissions'][$permission->module_id]['publish'])?
                           $data['permissions'][$permission->module_id]['publish']:
                           1;
                $update  = isset($data['permissions'][$permission->module_id]['update'])?
                           $data['permissions'][$permission->module_id]['update']:
                           1;
                $delete  = isset($data['permissions'][$permission->module_id]['delete'])?
                           $data['permissions'][$permission->module_id]['delete']:
                           1;

                $permission->update([
                    'read'      => $read,
                    'create'    => $create,
                    'publish'   => $publish,
                    'update'    => $update,
                    'delete'    => $delete
                ]);
            }
        }

        $this->save();
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class,'permission_roles');
    }

    public function admins()
    {
        return $this->hasMany(Admin::class);
    }

    public static function getSelect()
    {
        $roles = collect();

        foreach (self::all() as $role){
            $roles[$role->id] = $role->title;
        }

        return $roles;
    }
}
