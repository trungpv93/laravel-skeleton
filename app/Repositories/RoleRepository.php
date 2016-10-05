<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface RoleRepository
 * @package namespace App\Repositories;
 */
interface RoleRepository extends RepositoryInterface
{
	/**
     * get List Role By Permission ID
     *
     * @param  string  $id
     * @return \Illuminate\Database\Eloquent\Collection
     */
	public function getRolesByPermissionID($id);

    /**
     * get List Role By User ID
     *
     * @param  string  $id
     * @return \Illuminate\Database\Eloquent\Collection
     */
	public function getRolesByUserID($id);

     /**
     * get List role_user By User ID
     *
     * @param  string  $id
     * @return \Illuminate\Database\Eloquent\Collection
     */
	public function getRoleUserByUserID($id);
}
