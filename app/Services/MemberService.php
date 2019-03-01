<?php
/**
 * Created by PhpStorm.
 * User: 55035
 * Date: 28/02/2019
 * Time: 17:46
 */

namespace ManagerMembers\Services;


use Illuminate\Support\Facades\DB;
use ManagerMembers\Repositories\MemberRepository;

class MemberService
{
    /**
     * @var MemberRepository
     */
    private $memberRepository;

    public function __construct(MemberRepository $memberRepository)
    {
        $this->memberRepository = $memberRepository;
    }

    public function create($data){
        DB::beginTransaction();
        try{
            $member = $this->memberRepository->create($data);

            DB::commit();

            return $member;

        }catch (\Exception $e){
            DB::rollBack();
            return $e;
        }
    }
}