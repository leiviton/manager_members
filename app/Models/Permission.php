<?php

namespace App\Models;

class Permission extends \App\Models\Base\Permission
{
	protected $fillable = [
		'name',
		'label'
	];
}
