<?php

namespace Wcli\Wconfig\Functions;

use Waka\Utils\Classes\FunctionsBase;
use Waka\Wcms\Models\Need;
use Waka\Wcms\Models\Solution;

class Projet extends FunctionsBase
{
    public $model;
    use \Waka\Utils\Classes\Traits\ScopePeriodes;

     public function produits($attributes)
    {
        $result = $this->model->projetProduits();

        if ($attributes['gamme'] ?? false) {
            $result = $result->whereIn('gamme_id', $attributes['gamme']);
        }
        $result = $result->orderby('sort_order', 'asc')->with('gamme')->get();

        return $result->toArray();
    }

}
