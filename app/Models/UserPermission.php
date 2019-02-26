<?php

namespace App\Models;

class UserPermission extends \App\Models\Base\UserPermission
{
	protected $fillable = [
		'user_id',
		'permission_id'
	];
}
