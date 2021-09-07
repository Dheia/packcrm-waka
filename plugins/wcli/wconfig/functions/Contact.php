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
        $result = $this->model->client->ventes();

        if ($attributes['periode'] ?? false) {
            $result = $result->wakaPeriode($attributes['periode'], 'sale_at');
        }

        if ($attributes['gamme'] ?? false) {
            $result = $result->whereIn('gamme_id', $attributes['gamme']);
        }
        $result = $result->orderby('sale_at', 'asc')->with('client', 'gamme')->get();

        return $result->toArray();
    }

    public function chart1($attributes)
    {
        $dataSet = $this->model->client->getVentesByMonthValue($attributes);
        $dataSet2 = $this->model->client->getVentesByMonthN1Value($attributes);
        $labels = $this->model->client->getVentesByMonthLabel($attributes);


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

        $chart = new \Waka\Charter\Controllers\Charts();
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

    public function gammes($attributes) {
        $gamme = '\Wcli\Crm\Models\Gamme';
         if ($attributes['gamme'] ?? false) {
            $gamme =  $gamme::whereIn('id', $attributes['gamme'])->get();
        } else {
            $gamme =  $gamme::get();
        }
        return $gamme->toArray();
    }

    public function getTagList()
    {
        return \Waka\Segator\Models\Tag::where('data_source', 'client')->lists('name', 'id');
    }

}
