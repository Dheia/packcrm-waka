<?php

namespace Wcli\Wconfig\Functions;

use Waka\Utils\Classes\FunctionsBase;

class User extends FunctionsBase
{
    public $model;

    public function projects($attributes)
    {
        //trace_log(Client::first()->get());

        $result = $this->model->projects();

        if ($attributes['project_state'] ?? false) {
            $result = $result->whereHas('project_state', function ($query) use ($attributes) {
                $query->whereIn('id', $attributes['project_state']);
            });
        }
        if ($attributes['start_date'] ?? false) {
            $result = $result->whereDate('updated_at', '>=', $attributes['start_date']);
        }
        if ($attributes['end_date'] ?? false) {
            $result = $result->whereDate('updated_at', '<=', $attributes['start_date']);
        }
        $result = $result->with('project_state', 'client', 'missions')->orderby('start_at', 'asc')->get();

        if ($attributes['add_picture'] ?? false) {

            foreach ($result as $key => $row) {
                $finalResult[$key] = $row->toArray();
                $options = [
                    'width' => $attributes['width'] ?? null,
                    'height' => $attributes['height'] ?? null,
                    'crop' => $attributes['crop'] ?? 'fit',
                    'gravity' => $attributes['gravity'] ?? 'center',
                ];
                $montage = $row->client->montages->find(3);
                $urlImg = $row->client->getMontage($montage, $options);

                $finalResult[$key]['main_image'] = [
                    'path' => $urlImg,
                    'width' => $attributes['width'],
                    'height' => $attributes['height'],
                ];
            }

        } else {
            $finalResult = $result->toArray();
        }
        return $finalResult;
    }
    public function tasks($attributes)
    {
        $result = $this->model->tasks();
        if ($attributes['task_state'] ?? false) {
            $result = $result->whereHas('task_state', function ($query) use ($attributes) {
                $query->whereIn('id', $attributes['task_state']);
            });
        }
        if ($attributes['task_type'] ?? false) {
            $result = $result->whereHas('task_type', function ($query) use ($attributes) {
                $query->whereIn('id', $attributes['task_type']);
            });
        }
        if ($attributes['start_date'] ?? false) {
            $result = $result->whereDate('updated_at', '>=', $attributes['start_date']);
        }
        if ($attributes['end_date'] ?? false) {
            $result = $result->whereDate('updated_at', '<=', $attributes['start_date']);
        }
        $result = $result->with('task_state', 'task_type')->orderby('start_at', 'asc')->get()->toArray();
        return $result;
    }

}
