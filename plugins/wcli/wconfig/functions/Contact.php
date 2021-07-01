<?php

namespace Wcli\Wconfig\Functions;

use Waka\Utils\Classes\FunctionsBase;
use Waka\Wcms\Models\Need;
use Waka\Wcms\Models\Solution;

class Contact extends FunctionsBase
{
    public $model;
    use \Waka\Utils\Classes\Traits\ScopePeriodes;

    public function ventes($attributes)
    {
        $result = $this->model->client->ventes()->with('client');

        if ($attributes['periode'] ?? false) {
            $result = $result->wakaPeriode($attributes['periode'], 'sale_at');
        }
        $result = $result->orderby('sale_at', 'asc')->get();

        return $result->toArray();
    }

    /**
     * List et fonctions
     */

}
