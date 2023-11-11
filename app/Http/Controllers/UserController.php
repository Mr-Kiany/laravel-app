<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreRequest;
use App\Repositories\UserRepository;
use App\Tools\ResponseController;

class UserController extends ResponseController
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
        $user = $this->userRepository->create($params);

        if ($user->email) {
            $user->notify(new NewUserNotification);
        }
    
        if ($user->mobile) {
            // Send SMS logic here
            // Example: use a Twilio notification
            // $user->notify(new TwilioSmsNotification('Hello! You have a new user.'));
        }

        return $this->respondCreated($user);
    }
}
