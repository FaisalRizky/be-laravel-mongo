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
use Core\User\Transformer\UserLoginTransformer;
use Core\User\Transformer\UserRegisterTransformer;
use Core\User\Transformer\UserLogoutTransformer;

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
    public function __construct(UserServiceInterface $userService) 
    {
        $this->userService = $userService;
    }

    public function login(LoginRequest $request) 
    {
        return response()->json((new UserLoginTransformer())->transform($this->userService->login($request->only('email', 'password'))), HttpCodeInterface::OK);
    }

    public function register(RegisterRequest $request) 
    {
        return response()->json((new UserRegisterTransformer())->transform($this->userService->register($request)), HttpCodeInterface::CREATED);
    }

    public function logout() 
    {
        return response()->json((new UserLogoutTransformer())->transform($this->userService->logout()), HttpCodeInterface::OK);
    }

}