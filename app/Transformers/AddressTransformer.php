<?php

namespace ManagerMembers\Transformers;

use League\Fractal\TransformerAbstract;
use ManagerMembers\Models\Address;

/**
 * Class AddressTransformer.
 *
 * @package namespace ManagerMembers\Transformers;
 */
class AddressTransformer extends TransformerAbstract
{
    /**
     * Transform the Address entity.
     *
     * @param \ManagerMembers\Models\Address $model
     *
     * @return array
     */
    public function transform(Address $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
