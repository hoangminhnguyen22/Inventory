<?php
namespace App\Traits;

use App\Models\Role;

trait HasPermission
{
    protected $permissionList = null;
    protected $list = []; 

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasRole($role)
    {
        if (is_string($role)) {
            return $this->roles->contains('name', $role);
        }

        return false;
    }

    public function hasPermission($permission = null)
    {
        if (is_null($permission)) {
            return $this->getPermissions()->count() > 0;
        }

        if (is_string($permission)) {
            return $this->getPermissions()->contains('name', $permission);
        }

        return false;
    }

    private function getPermissions()
    {
        $role = $this->role_id;
        $role = Role::find($role);
        $permissions = $role->permissions;

        // dd($role);
        // if ($role) {
        //     if (! $role->relationLoaded('permissions')) {
        //         $this->roles->load('permissions');
        //     }

        //     $this->permissionList = $this->roles->pluck('permissions')->flatten();
        // }

        // return $this->permissionList ?? collect();
        
        return $permissions;
    }
}
