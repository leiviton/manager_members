<?php

namespace ManagerMembers\Transformers;

use League\Fractal\TransformerAbstract;
use ManagerMembers\Models\User;

/**
 * Class UserTransformer
 * @package namespace ApiLimp\Transformers;
 */
class UserTransformer extends TransformerAbstract
{
    /**
     * Transform the \User entity
     * @param \ManagerMembers\Models\User $model
     *
     * @return array
     */
    public function transform(User $model)
    {
        return [
            'id'    => (int) $model->id,
            'name'  => $model->name,
            'email' => $model->email,
            'role'  => $model->role,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
