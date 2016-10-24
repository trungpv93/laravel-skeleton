<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface UserRepository
 * @package namespace App\Repositories;
 */
interface UserRepository extends RepositoryInterface
{
    /**
    * create user with role
    *
    * @param  array  $attributes
    * @return mixed
    */
	public function createUserWithRole(array $attributes);

   /**
    * update user with role by ID
    *
    * @param  array  $attributes
    * @param  User $user
    * @return mixed
    */
	public function updateUserWithRole(array $attributes, $user);
}
