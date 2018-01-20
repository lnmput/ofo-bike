<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface UserRepository.
 *
 * @package namespace App\Repositories;
 */
interface UserRepository extends RepositoryInterface
{
    /**
     * 根据 username 自动判断查找用户
     * @param $username
     * @return mixed
     */
    public function findByUserName($username);
}
