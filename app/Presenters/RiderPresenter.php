<?php

namespace App\Presenters;

use App\Transformers\RiderTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class RiderPresenter.
 *
 * @package namespace App\Presenters;
 */
class RiderPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new RiderTransformer();
    }
}
