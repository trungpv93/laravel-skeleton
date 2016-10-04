<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class RoleValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
        	'name' => 'required|unique:roles,name',
          	'display_name' => 'required',
          	'description' => 'required',
          	'permission' => 'required',],
        ValidatorInterface::RULE_UPDATE => [
        	'display_name' => 'required',
          	'description' => 'required',
          	'permission' => 'required',],
   ];
}
