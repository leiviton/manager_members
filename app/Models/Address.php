<?php

namespace ManagerMembers\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Address.
 *
 * @package namespace ManagerMembers\Models;
 */
class Address extends \ManagerMembers\Models\Base\Address implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'member_id',
        'street',
        'number',
        'complement',
        'neighborhood',
        'city',
        'state',
        'postal_code'
    ];
}
