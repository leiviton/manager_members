<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 25 Feb 2019 19:00:22 +0000.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Address
 * 
 * @property int $id
 * @property int $member_id
 * @property string $street
 * @property int $number
 * @property string $complement
 * @property string $neighborhood
 * @property string $city
 * @property string $state
 * @property string $postal_code
 * @property float $lat
 * @property float $lon
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Member $member
 *
 * @package App\Models\Base
 */
class Address extends Eloquent
{
	protected $casts = [
		'member_id' => 'int',
		'number' => 'int',
		'lat' => 'float',
		'lon' => 'float'
	];

	public function member()
	{
		return $this->belongsTo(\App\Models\Member::class);
	}
}
