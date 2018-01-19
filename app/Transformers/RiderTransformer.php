<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Rider;

/**
 * Class RiderTransformer.
 *
 * @package namespace App\Transformers;
 */
class RiderTransformer extends TransformerAbstract
{
    /**
     * Transform the Rider entity.
     *
     * @param \App\Models\Rider $model
     *
     * @return array
     */
    public function transform(Rider $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
