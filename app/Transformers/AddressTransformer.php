<?php

namespace ManagerMembers\Transformers;

use League\Fractal\TransformerAbstract;
use ManagerMembers\Models\Address;

/**
 * Class AddressTransformer.
 *
 * @package namespace ApiLimp\Transformers;
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
            'street' => $model->street,
            'number' => $model->number,
            'complement' => $model->complement,
            'neighborhood' => $model->neighborhood,
            'city' => $model->city,
            'state' => $model->state,
            'postal_code' => $model->postal_code,
            'lat' => $model->lat,
            'lon' => $model->lon,
            /* place your other model properties here */
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
