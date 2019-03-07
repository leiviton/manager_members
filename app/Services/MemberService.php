<?php
/**
 * Created by PhpStorm.
 * User: 55035
 * Date: 28/02/2019
 * Time: 17:46
 */

namespace ManagerMembers\Services;


use Illuminate\Support\Facades\DB;
use ManagerMembers\Repositories\AddressRepository;
use ManagerMembers\Repositories\MemberRepository;
use ManagerMembers\Repositories\UserRepository;

class MemberService
{
    /**
     * @var MemberRepository
     */
    private $memberRepository;
    /**
     * @var AddressRepository
     */
    private $addressRepository;
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * MemberService constructor.
     * @param MemberRepository $memberRepository
     * @param AddressRepository $addressRepository
     * @param UserRepository $userRepository
     */
    public function __construct(MemberRepository $memberRepository, AddressRepository $addressRepository, UserRepository $userRepository)
    {
        $this->memberRepository = $memberRepository;
        $this->addressRepository = $addressRepository;
        $this->userRepository = $userRepository;
    }

    public function create($data){
        DB::beginTransaction();
        try{
            $user = [
              "email" => $data['email'],
              "password" => bcrypt('123456'),
              "name" => $data['nome'],
              "role" => 'member',
              "remember_token" => md5(123456),
            ];

            $resultUser = $this->userRepository->create($user);

            $data['user_id'] = $resultUser->id;

            $data['data_nascimento'] = $this->invertDate($data['data_nascimento']);

            $member = $this->memberRepository->create($data);

            $address = $data['address'];

            $address['member_id'] = $member->id;

            $this->addressRepository->create($address);

            DB::commit();

            return $member;

        }catch (\Exception $e){
            DB::rollBack();
            return $e;
        }
    }

    public function listar()
    {
        return $this->memberRepository->skipPresenter(false)->all();
    }

    public function find($id)
    {
        return $this->memberRepository->skipPresenter(false)->find($id);
    }

    /**
     * @param $date
     * @return \DateTime
     */
    public function invertDate($date){
        $result = '';
        if(count(explode("/",$date)) > 1){
            $result = implode("-",array_reverse(explode("/",$date)));
            return new \DateTime($result);
        }elseif(count(explode("-",$date)) > 1){
            $result = implode("/",array_reverse(explode("-",$date)));
            return new \DateTime($result);
        }
    }

    public function update(array $data, $id)
    {

        DB::beginTransaction();
        try{
            $this->memberRepository->update($data, $id);

            $memberId = $this->memberRepository->find($id, ['user_id'])->user_id;

            $member_update = $this->memberRepository->update($data['user'], $memberId);

            DB::commit();

            return $member_update;

        }catch (\Exception $e){
            DB::rollBack();
            return $e;
        }

    }
}
