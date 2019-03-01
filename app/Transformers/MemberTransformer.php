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
    protected $availableIncludes = ['user','address'];
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
            'nome' => $model->nome,
            'sobrenome' => $model->sobrenome,
            'img_profile' => $model->img_profile,
            'pai' => $model->pai,
            'mae' => $model->mae,
            'cpf' => $model->cpf,
            'rg' => $model->rg,
            'email' => $model->email,
            'whatsapp' => $model->whatsapp,
            /* place your other model properties here */
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }

    public function includeUser(Member $model){
        return $this->item($model->user, new UserTransformer());
    }

    public function includeAddress(Member $member){
        return $this->collection($member->addresses, new AddressTransformer());
    }
}
