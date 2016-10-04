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
}
