<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\RoleRepository;
use App\Entities\Role;
use App\Validators\RoleValidator;

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
}
