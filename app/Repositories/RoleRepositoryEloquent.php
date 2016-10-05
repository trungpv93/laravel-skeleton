<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\RoleRepository;
use App\Entities\Role;
use App\Validators\RoleValidator;
use DB;

/**
 * Class RoleRepositoryEloquent
 * @package namespace App\Repositories;
 */
class RoleRepositoryEloquent extends BaseRepository implements RoleRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Role::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {

        return RoleValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }


    /**
     * get List Role By Permission ID
     *
     * @param  string  $id
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getRolesByPermissionID($id){
        return Role::join('permission_role', 'permission_role.role_id', '=', 'roles.id')
          ->where('permission_role.permission_id', $id)
          ->get();
    }

     /**
     * get List Role By User ID
     *
     * @param  string  $id
     * @return \Illuminate\Database\Eloquent\Collection
     */
	public function getRolesByUserID($id){
        return Role::join('role_user', 'role_user.role_id', '=', 'roles.id')
        ->where('role_user.user_id', $id)
        ->get();
    }

    /**
     * get List role_user By User ID
     *
     * @param  string  $id
     * @return \Illuminate\Database\Eloquent\Collection
     */
	public function getRoleUserByUserID($id){
        return DB::table('role_user')->where('role_user.user_id', $id)
        ->pluck('role_user.role_id', 'role_user.role_id')->all();
    }
}
