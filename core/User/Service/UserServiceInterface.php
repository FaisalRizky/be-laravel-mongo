<?php

/**
 * User: isalriz9@gmail.com
 * Date: 27/08/23 15:14
 */

namespace Core\User\Service;

/**
 * Interface UserServiceInterface
 *
 * @package Core\User\Service
 */
interface UserServiceInterface
{
    /**
     * @param array $input
     * @return Response
     */
    public function login(array $input);

    /**
     * @return void
     */
    public function logout();

    /**
     * @param array $input
     * @return Response
     */
    public function register(array $input);
}