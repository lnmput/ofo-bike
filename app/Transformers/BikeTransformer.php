<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Bike;

/**
 * Class BikeTransformer.
 *
 * @package namespace App\Transformers;
 */
class BikeTransformer extends TransformerAbstract
{
    /**
     * Transform the Bike entity.
     *
     * @param \App\Models\Bike $model
     *
     * @return array
     */
    public function transform(Bike $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
