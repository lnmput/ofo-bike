<?php

namespace App\Presenters;

use App\Transformers\BikeTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class BikePresenter.
 *
 * @package namespace App\Presenters;
 */
class BikePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new BikeTransformer();
    }
}
