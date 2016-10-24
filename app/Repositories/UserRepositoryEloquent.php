<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\UserRepository;
use App\Entities\User;
use App\Validators\UserValidator;
use DB;
use Carbon\Carbon;

/**
 * Class UserRepositoryEloquent
 * @package namespace App\Repositories;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {

        return UserValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
    * create user with role
    *
    * @param  array  $attributes
    * @return mixed
    */
    public function createUserWithRole(array $attributes){
        $user = new User();
        $user->username = $attributes['username'];
        $user->name = DB::raw("N'".$attributes['name']."'");
        $user->email = $attributes['email'];
        $user->password = bcrypt($attributes['password']);
        $user->last_online_at = Carbon::now();
        $user->save();

        foreach ($attributes['role'] as $key => $value) {
            $user->attachRole($value);
        }

        return $user;
    }

    /**
    * update user with role by ID
    *
    * @param  array  $attributes
    * @param  User $user
    * @return mixed
    */
    public function updateUserWithRole(array $attributes, $user){
     
        if($attributes['name'] !== null && $attributes['name'] != ''){
            $user->name = DB::raw("N'".$attributes['name']."'");
        }

        if (null !== $attributes['password'] && $attributes['password'] != '') {
            $user->password = bcrypt($attributes['password']);
        }

        $user->save();

        DB::table('role_user')->where('role_user.user_id', $user->id)
            ->delete();
        foreach ($attributes['role'] as $key => $value) {
            $user->attachRole($value);
        }

        return $user;
    }
}
