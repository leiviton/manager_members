<?php

namespace ManagerMembers\Repositories;

use ManagerMembers\Presenters\MemberPresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use ManagerMembers\Models\Member;
use ManagerMembers\Validators\MemberValidator;

/**
 * Class MemberRepositoryEloquent.
 *
 * @package namespace ManagerMembers\Repositories;
 */
class MemberRepositoryEloquent extends BaseRepository implements MemberRepository
{
    protected $skipPresenter = true;
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Member::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * @return string
     */
    public function presenter()
    {
        return MemberPresenter::class;
    }
}
