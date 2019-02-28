<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 25 Feb 2019 19:00:22 +0000.
 */

namespace ManagerMembers\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Member
 * 
 * @property int $id
 * @property int $user_id
 * @property string $nome
 * @property string $sobrenome
 * @property string $pai
 * @property string $mae
 * @property string $cpf
 * @property string $rg
 * @property string $email
 * @property string $whatsapp
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \ManagerMembers\Models\User $user
 * @property \Illuminate\Database\Eloquent\Collection $addresses
 *
 * @package App\Models\Base
 */
class Member extends Eloquent
{
	protected $casts = [
		'user_id' => 'int'
	];

	public function user()
	{
		return $this->belongsTo(\ManagerMembers\Models\User::class);
	}

	public function addresses()
	{
		return $this->hasMany(\ManagerMembers\Models\Address::class);
	}
}
