<?php
declare(strict_types=1);

/**
 * User: isalriz9@gmail.com
 * Date: 27/08/23 15:06
 */

namespace Core\User\Service;

use Core\Foundation\Exception\MessageExceptionInterface;
use Core\Foundation\Exception\HttpCodeInterface;
use Core\User\Entity\Repository\UserRepository;
use Core\User\Exception\UserNotFoundException;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

/**
 * Class UserService
 *
 * @package Core\User\Service
 */
class UserService implements UserServiceInterface {
    
    /**
     * @var $userRepository UserRepository
     */
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @inheritdoc
     */
    public function register($request) 
    {
        $result = $this->userRepository->register($request);
        return [
            'message' => "Successfully Register User",
            'data'     => $result
        ];
    }

    /**
     * @inheritdoc
     */
    public function login($request) 
    {    
        $credentials = $request;
        if (! $token = JWTAuth::attempt($credentials)) {
            throw new UserNotFoundException(MessageExceptionInterface::USER_CREDENTIAL_NOT_FOUND, HttpCodeInterface::NOT_FOUND);
        } return ['access_token' => $token];
    }


    /**
     * @inheritdoc
     */
    public function logout() 
    {
        Auth::guard('api')->logout();
        return ['message' => "Successfully Logout"];
    }
}

