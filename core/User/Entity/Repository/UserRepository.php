<?php
declare(strict_types=1);

/**
 * User: isalriz9@gmail.com
 * Date: 27/08/23 15:34
 */

namespace Core\User\Entity\Repository;

use Core\User\Entity\Model\User;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserService
 *
 * @package Core\User\Entity\Repository
 */
class UserRepository implements UserRepositoryInterface
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function register($request)
    {
        try {
            $user = new User([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            $user->save();
            return $user;
            
        } catch (\Exception $exception) {
            return [
                'message' => $exception->getMessage(),
            ];
        }
    }
}
