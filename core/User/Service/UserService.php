<?php
declare(strict_types=1);

/**
 * User: isalriz9@gmail.com
 * Date: 27/08/23 15:06
 */

namespace Core\User\Service;

use Core\Foundation\Exception\MessageExceptionInterface;
use Core\User\Entity\Repository\UserRepository;
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
     * @var $userRepository UserRepositoryInterface
     */
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @inheritdoc
     */
    public function register($request) {
        
        $result = $this->userRepository->register($request);

        return [
            'status' => true, 
            'message' => "Successfully Register User",
            'data'     => $result
        ];
    }

    /**
     * @inheritdoc
     */
    public function login($request) {
        
        $credentials = $request->only('email', 'password');
        if (! $token = JWTAuth::attempt($credentials)) {
            return [
                'status' => false, 
                'message' => MessageExceptionInterface::USER_CREDENTIAL_NOT_FOUND
            ];
        }

        return [
            'status' => true,
            'access_token' => $token,
            'token_type' => 'bearer',
        ];
    }


    /**
     * @inheritdoc
     */
    public function logout() 
    {
        Auth::guard('api')->logout();
        return ['status' => true, 
                'message' => "Successfully Logout"
       ];
    }
}

