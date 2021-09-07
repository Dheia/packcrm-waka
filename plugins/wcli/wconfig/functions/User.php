<?php

namespace Wcli\Wconfig\Functions;

use Waka\Utils\Classes\FunctionsBase;

class User extends FunctionsBase
{
    public $model;

    public function clientsventes($attributes)
    {
        $clients = null;
        if($attributes['tag'] ?? false) {
            $clients = \Wcli\Crm\Models\Client::tagFilter($attributes['tag'])->get();
        }
        if(!$clients) {
            $clients = \Wcli\Crm\Models\Client::get();
        }
        $clients = $this->getAttributesDs($clients);

        if($attributes['column'] && $attributes['calcul'] && $attributes['valeur']) {
            $clients = $clients->reject(function ($item, $key) use($attributes) {
                $column = $attributes['column'];
                $calcul = $attributes['calcul'];
                $valeur = $attributes['valeur'];
                return !$this->dynamic_comparison($item[$column], $calcul, $valeur);
            });
        }
        

        return $clients->toArray();
    }

    public function getTagList()
    {
        return \Waka\Segator\Models\Tag::where('data_source', 'client')->lists('name', 'id');
    }

}
