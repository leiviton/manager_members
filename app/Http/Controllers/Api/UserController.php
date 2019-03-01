<?php
/**
 * Created by PhpStorm.
 * User: leviton
 * Date: 17/08/2016
 * Time: 15:26
 */

namespace ManagerMembers\Http\Controllers\Api;


use ManagerMembers\Http\Controllers\Controller;
use ManagerMembers\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        return $this->userRepository->skipPresenter(false)->all();
    }

    public function authenticated(){
        $user = \Auth::guard('api')->user();
        return $this->userRepository->skipPresenter(false)->find($user->id);
    }
}