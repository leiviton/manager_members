<?php

namespace ManagerMembers\Transformers;

use League\Fractal\TransformerAbstract;
use ManagerMembers\Models\Member;

/**
 * Class MemberTransformer.
 *
 * @package namespace ManagerMembers\Transformers;
 */
class MemberTransformer extends TransformerAbstract
{
    /**
     * Transform the Member entity.
     *
     * @param \ManagerMembers\Models\Member $model
     *
     * @return array
     */
    public function transform(Member $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
