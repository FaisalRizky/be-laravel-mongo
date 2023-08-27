<?php
declare(strict_types=1);

/**
 * User: isalriz9@gmail.com
 * Date: 27/08/23 15:03
 */

namespace App\Http\Controllers;

use Core\User\Service\Requests\RegisterRequest;
use Core\User\Service\Requests\LoginRequest;
use Core\User\Service\UserServiceInterface;
use Core\Foundation\Exception\HttpCodeInterface;

use Illuminate\Http\Request;

/**
 * Class AuthorizationController
 *
 * @package app\Http\Controllers
 */
class AuthorizationController extends Controller
{

    /**
     * @var UserServiceInterface
     */
    protected $userService;

    /**
     * AuthorizationController constructor.
     *
     * @param UserServiceInterface $userService
     */
    public function __construct(UserServiceInterface $userService) {
        $this->userService = $userService;
    }

    public function login(LoginRequest $request) {
        return response()->json($this->userService->login($request), HttpCodeInterface::OK);
    }

    public function register(RegisterRequest $request) {
        return response()->json($this->userService->register($request), HttpCodeInterface::OK);
    }

    public function logout()
    {
        return response()->json($this->userService->logout(), HttpCodeInterface::OK);
    }

}