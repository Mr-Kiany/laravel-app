<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreRequest;
use App\Repositories\UserRepository;
use App\Tools\ResponseOutput\ResponseController;

class SettingController extends ResponseController
{
    private UserRepository $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $result = $this->userRepository->getAllUser();
        return $this->respond($result);
    }

    public function create(StoreRequest $request)
    {
        $params = [
            "name" => $request->name,
            "email" => $request->email,
            "mobile" => $request->mobile,
            "password" => bcrypt($request->password),
        ];
        $result = $this->userRepository->create($params);
        return $this->respondCreated($result);
    }
}
