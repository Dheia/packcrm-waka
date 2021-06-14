<?php

namespace Wcli\Wconfig\Functions;

use Waka\Utils\Classes\FunctionsBase;
use Waka\Wcms\Models\Need;
use Waka\Wcms\Models\Solution;

class Contact extends FunctionsBase
{
    public $model;

    public function solutionsFiltered($attributes)
    {
        //trace_log($attributes['solutions']);
        $results = Solution::whereIn('id', $attributes['solutions'])->with('main_image')->get();
        //trace_log($results);
        $finalResult = [];
        foreach ($results as $key => $result) {
            $finalResult[$key] = $result->toArray();
            $options = [
                'width' => $attributes['width'] ?? null,
                'height' => $attributes['height'] ?? null,
                'crop' => $attributes['crop'] ?? 'fit',
                'gravity' => $attributes['gravity'] ?? 'center',
            ];
            $finalResult[$key]['main_image'] = [
                'path' => $result->main_image->getUrl($options),
                'width' => $attributes['width'],
                'height' => $attributes['height'],
            ];
        }
        return $finalResult;
    }

    public function needsFiltered($attributes)
    {
        $results = Need::whereIn('id', $attributes['needs'])->with('main_image')->get();
        $finalResult = [];
        foreach ($results as $key => $result) {
            $finalResult[$key] = $result->toArray();
            $options = [
                'width' => $attributes['width'] ?? null,
                'height' => $attributes['height'] ?? null,
                'crop' => $attributes['crop'] ?? 'fit',
                'gravity' => $attributes['gravity'] ?? 'center',
            ];
            $finalResult[$key]['main_image'] = [
                'path' => $result->main_image->getUrl($options),
                'width' => $attributes['width'],
                'height' => $attributes['height'],
            ];
        }
        return $finalResult;
    }

    public function projectByStateByDate($attributes)
    {
        //trace_log($this->model->client->name);
        $projects = $this->model->client->projects()
            ->whereIn('state', $attributes['state']);
        if($attributes['start_date']) {
            $projects = $projects->where('updated_at', '>' ,$attributes['start_date']);
        }
        if($attributes['end_date']) {
            $projects = $projects->where('updated_at', '<' ,$attributes['end_date']);
        }
        return $projects->get()->toArray();
    }

    /**
     * List et fonctions
     */
    public function getSolution()
    {
        return \Waka\Wcms\Models\Solution::first()->toArray();
    }

    public function getNeed()
    {
        return \Waka\Wcms\Models\Need::first()->toArray();
    }
    public function getProjectState() {
        $projectModel = new \Wcli\Crm\Models\Project();
        return $projectModel->listAllWorklowstate();
    }

}
