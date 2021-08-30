<?php

namespace Wcli\Wconfig\Functions\Tags;

use Db;
use Wcli\Crm\Models\Gamme;
use Wcli\Crm\Models\Vente;
use Waka\Segator\Classes\BaseTag;
use Wcli\Wconfig\Models\UniqueAgg;

class ClientTags extends BaseTag
{
    public $model;
    public $list;

    use \Waka\Utils\Classes\Traits\ScopePeriodes;

    public function listTagAttributes()
    {
        return [
            'nbVentesGammes' => [
                'name' => "Tague si NB ventes supérieures à XX sur les gammes ",
                'attributes' => [
                    'nb' => [
                        'label' => "Nombre",
                        'type' => "number",
                    ],
                    'gammes' => [
                        'label' => "Gammes",
                        'type' => "taglist",
                        'useKey' => true,
                        'options' => Gamme::lists('name', 'id'),
                    ],
                    'periode' => $this->getPeriodeConfig("Choisissez une période"),
                ],
            ],
        ];
    }

    public function nbVentesGammes($attributes = [], $ids = [])
    {
        $periode = $attributes['periode'] ?? false;

        $ventes = null;

        $ventes = Vente::wakaPeriode($periode, 'sale_at');

        if ($attributes['gammes'] ?? false) {
            $ventes = $ventes->whereIn('gamme_id', $attributes['gammes']);
        }



        $ventes = $ventes->select('client_id', Db::raw('COUNT(*) as nb_ventes'))
            ->groupBy('client_id')
            ->havingRaw('COUNT(*) > ' . $attributes['nb']);

        if (count($ids)) {
            $ventes->whereIn('client_id', $ids);
        }

        return $ventes->get()->pluck('client_id');
    }

}
