<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\PermissionRepository;
use App\Entities\Permission;
use App\Validators\PermissionValidator;
use DB;

/**
 * Class PermissionRepositoryEloquent
 * @package namespace App\Repositories;
 */
class PermissionRepositoryEloquent extends BaseRepository implements PermissionRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Permission::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {

        return PermissionValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
    * get permission_role by Role ID
    *
    * @param  string  $id
    * @return \Illuminate\Database\Eloquent\Collection
    */
    public function getPermissionRoleByRoleID($id){
        return DB::table('permission_role')->where('permission_role.role_id', $id)
          ->pluck('permission_role.permission_id', 'permission_role.permission_id')->all();
    }

    /**
    * get permission by Role ID
    *
    * @param  string  $id
    * @return \Illuminate\Database\Eloquent\Collection
    */
    public function getPermissionByRoleID($id){
        return Permission::join('permission_role', 'permission_role.permission_id', '=', 'permissions.id')
          ->where('permission_role.role_id', $id)
          ->get();
    }

    /**
    * delete permission_role by Role ID
    *
    * @param  string  $id
    * @return bool|null
    */
    public function deletePermissionRoleByRoleID($id){
        return DB::table('permission_role')->where('permission_role.role_id', $id)
          ->delete();
    }
}
