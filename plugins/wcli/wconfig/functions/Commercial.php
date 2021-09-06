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
        $result = $result->orderby('sale_at', 'asc')->with('client')->get();

        return $result->toArray();
    }

    public function chart1($attributes)
    {
        $dataSet = $this->model->getVentesByMonthValue($attributes);
        $dataSet2 = $this->model->getVentesByMonthValue($attributes);
        $labels = $this->model->getVentesByMonthLabel($attributes);

        $options = [
            'type' => $attributes['chartType'],
            'beginAtZero' => $attributes['beginAtZero'] ?? false,
            // 'color' => $attributes['color'],
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

        $finalResult[0]['chart'] = [
            'path' => $chart_url,
            'width' => $attributes['width'],
            'height' => $attributes['height'],
        ];
        return $finalResult;

        return $result->toArray();
    }

}
