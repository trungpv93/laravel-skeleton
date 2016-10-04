<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface PermissionRepository
 * @package namespace App\Repositories;
 */
interface PermissionRepository extends RepositoryInterface
{
	/**
    * get permission_role by Role ID
    *
    * @param  string  $id
    * @return \Illuminate\Database\Eloquent\Collection
    */
	public function getPermissionRoleByRoleID($id);

    /**
    * delete permission_role by Role ID
    *
    * @param  string  $id
    * @return bool|null
    */
    public function deletePermissionRoleByRoleID($id);

	/**
    * get permission by Role ID
    *
    * @param  string  $id
    * @return \Illuminate\Database\Eloquent\Collection
    */
	public function getPermissionByRoleID($id);
}
