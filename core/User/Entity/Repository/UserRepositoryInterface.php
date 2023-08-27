<?php
declare(strict_types=1);

/**
 * User: isalriz9@gmail.com
 * Date: 27/08/23 15:34
 */

namespace Core\User\Entity\Repository;

/**
 * Class UserRepositoryInterface
 *
 * @package Core\User\Entity\Repository
 */
interface UserRepositoryInterface
{
    /**
     * @param array $input
     * @return Response
     */
    public function register($request);

}