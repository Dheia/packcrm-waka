<?php

namespace Wcli\Wconfig\Functions;

use Waka\Utils\Classes\FunctionsBase;
use Waka\Charter\Controllers\Charts;

class Commercial extends FunctionsBase
{
    public $model;
    use \Waka\Utils\Classes\Traits\ScopePeriodes;

    public function ventes($attributes)
    {
        $result = $this->model->ventes();

        if ($attributes['periode'] ?? false) {
            $result = $result->wakaPeriode($attributes['periode'], 'sale_at');
        }
        $result = $result->orderby('sale_at', 'asc')->with('client', 'gamme')->get();

        return $result->toArray();
    }

    public function clientsventes($attributes)
    {
        $clients = $this->model->clients();
        if($attributes['tag'] ?? false) {
            $clients = $clients->tagFilter($attributes['tag']);
        }
        
        $clients = $clients->get();
        $clients = $this->getAttributesDs($clients);

        if($attributes['column'] && $attributes['calcul'] && $attributes['valeur']) {
            trace_log("OKOKOK");
            $clients = $clients->reject(function ($item, $key) use($attributes) {
                $column = $attributes['column'];
                $calcul = $attributes['calcul'];
                $valeur = $attributes['valeur'];
                return !$this->dynamic_comparison($item[$column], $calcul, $valeur);
            });
        }
        

        return $clients->toArray();
    }

    public function chart1($attributes)
    {
        $dataSet = $this->model->getVentesByMonthValue($attributes);
        $dataSet2 = $this->model->getVentesByMonthN1Value($attributes);
        $labels = $this->model->getVentesByMonthLabel($attributes);


        $options = [
            'type' => $attributes['chartType'],
            'beginAtZero' => $attributes['beginAtZero'] ?? false,
            'color' => $attributes['color'],
        ];
        $datas = [
            'labels' => $labels,
            'datasets' => [
                [
                    'data' => $dataSet,
                    'label' => 'CA (N-1)',
                ],
                [
                    'data' => $dataSet2,
                    'label' => 'CA (N)',
                ],
            ],
        ];

        $chart = new Charts();
        $chart_url = $chart->setChartType('bar_or_line')
                    ->addChartDatas($datas)
                    ->addChartOptions($options)
                    ->getChartUrl($attributes['width'], $attributes['height']);

        trace_log($chart_url);

        $finalResult[0]['chart'] = [
            'path' => $chart_url,
            'width' => $attributes['width'],
            'height' => $attributes['height'],
        ];
        return $finalResult;

        return $result->toArray();
    }

    public function getTagList()
    {
        return \Waka\Segator\Models\Tag::where('data_source', 'client')->lists('name', 'id');
    }

}
