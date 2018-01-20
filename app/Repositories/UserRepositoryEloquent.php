<?php

namespace App\Repositories;

use App\Criteria\HasFieldCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\UserRepository;
use App\Models\User;
use App\Validators\UserValidator;

/**
 * Class UserRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return UserValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function findByUserName($username)
    {

        if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
            return $this->pushCriteria(new HasFieldCriteria('email', $username))->first();
        } elseif (is_numeric($username)) {
            return $this->pushCriteria(new HasFieldCriteria('mobile', $username))->first();
        } else {
            return $this->pushCriteria(new HasFieldCriteria('name', $username))->first();
        }


    }

}
