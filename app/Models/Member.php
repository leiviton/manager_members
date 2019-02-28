<?php

namespace ManagerMembers\Models;

use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Member.
 *
 * @package namespace ManagerMembers\Models;
 */
class Member extends \ManagerMembers\Models\Base\Member implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'nome',
        'sobrenome',
        'pai',
        'mae',
        'cpf',
        'rg',
        'email',
        'whatsapp'
    ];
}
