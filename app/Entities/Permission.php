<?php

namespace App\Entities;

use Zizaco\Entrust\EntrustPermission;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Permission extends EntrustPermission implements Transformable
{
    use TransformableTrait;

}
