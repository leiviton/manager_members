<?php

namespace ManagerMembers\Repositories;

use ManagerMembers\Presenters\AddressPresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use ManagerMembers\Models\Address;
use ManagerMembers\Validators\AddressValidator;

/**
 * Class AddressRepositoryEloquent.
 *
 * @package namespace ManagerMembers\Repositories;
 */
class AddressRepositoryEloquent extends BaseRepository implements AddressRepository
{
    protected $skipPresenter = true;
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Address::class;
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
      return AddressPresenter::class;
    }
    
}
