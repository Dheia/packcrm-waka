<?php

namespace Wcli\Wconfig\Functions;

use Waka\Utils\Classes\FunctionsBase;
use Waka\Charter\Controllers\Charts;

class Commercial extends FunctionsBase
{
    public $model;
    use \Waka\Utils\Classes\Traits\ScopePeriodes;

    public function projets($attributes)
    {
        $result = $this->model->projets();

        if ($attributes['scope'] ?? false) {
            $result = $result->{$attributes['scope']}();
        }
        $result = $result->orderby('updated_at', 'asc')->with('client', 'contact')->get();

        return $result->toArray();
    }

}
