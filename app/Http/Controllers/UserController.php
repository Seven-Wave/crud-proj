<?php

namespace App\Http\Controllers;

use App\Contracts\UserControllerInterface;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserControllerInterface $userService)
    {
        $this->userService = $userService;
    }

    public function index(Request $req) {
        return $this->userService->index($req);
    }

    public function create(Request $req) {

        return $this->userService->create($req);
    }

    public function update(Request $req) {

        return $this->userService->update($req);
    }

    public function delete(Request $request) {

        return $this->userService->delete($request);
    }
}
