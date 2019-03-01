<?php

namespace ManagerMembers\Http\Controllers\Api\V1\Admin;

use Dotenv\Validator;
use Illuminate\Http\Request;
use ManagerMembers\Http\Controllers\Controller;
use ManagerMembers\Http\Requests\Api\V1\Admin\MembersControllerCreateRequest;
use ManagerMembers\Services\MemberService;

class MembersController extends Controller
{
    /**
     * @var MemberService
     */
    private $service;

    public function __construct(MemberService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->service->listar();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param MembersControllerCreateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(MembersControllerCreateRequest $request)
    {
        $validator = Validator($request->all(),['nome' => 'required|min:5',
            'sobrenome' => 'required|min:5',
            'pai' => 'required|min:5',
            'mae' => 'required|min:5',
            'email' => 'required|min:10|email|unique:members',
            'cpf' => 'required|min:10|unique:members',
            'rg' => 'required|min:8|unique:members',
            'whatsapp' => 'required|min:10|unique:members']);

        if ($validator->fails()) {
            return response()->json([
                'title' => 'Erro',
                'status' => 'error',
                'message' => $validator->messages()->first()
            ], 406);
        }

        $data = $request->all();

        $result = $this->service->create($data);

        if($result->id) {
            return response()->json(['message'=>'Cadastro realizado com sucesso','status'=>'success','title'=>'Sucesso'],201);
        }else{
            return response()->json(['message' => 'Houve um erro, tente novamente','status' => 'error','title'=>'Erro'],400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->service->find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function upload(Request $request)
    {
        $nameFile = null;
        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
            $name = uniqid(date('HisYmd'));
            $extension = $request->photo->extension();
            $nameFile = "{$name}.{$extension}";
            $upload = $request->photo->storeAs('members', $nameFile, 'public');
            if (!$upload) {
                return response()->json(['message' => 'arquivo nao enviado', 'status' => 'error'], 400);
            } else {
                return response()->json(['message' => 'arquivo enviado', 'status' => 'success', 'name' => $nameFile, 'url' => env("APP_URL").'/storage/members/'.$nameFile], 200);
            }
        }
    }
}
