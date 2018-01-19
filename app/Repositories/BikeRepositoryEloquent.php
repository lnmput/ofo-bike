<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\BikeRepository;
use App\Models\Bike;
use App\Validators\BikeValidator;

/**
 * Class BikeRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class BikeRepositoryEloquent extends BaseRepositoryEloquent implements BikeRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Bike::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return BikeValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
