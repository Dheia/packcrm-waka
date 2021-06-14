<?php

namespace Wcli\Wconfig\Functions;

use Winter\Storm\Support\Collection;
use Waka\Utils\Classes\FunctionsBase;

class Client extends FunctionsBase
{
    public $model;

    public function projets($attributes)
    {
        $result = $this->model->projects();

        if ($attributes['state'] ?? false) {
            $result = $result->whereIn('state', $attributes['state']);
        }

        if ($attributes['start_date'] ?? false) {
            $result = $result->whereDate('updated_at', '>=', $attributes['start_date']);
        }
        if ($attributes['end_date'] ?? false) {
            $result = $result->whereDate('updated_at', '<=', $attributes['start_date']);
        }

        $result = $result->orderby('start_at', 'asc')->get();

        return $result->toArray();
    }

    public function taches($attributes)
    {
        $globalResult = new Collection();

        if ($attributes['task_from'] == 'all' || $attributes['task_from'] == 'client') {
            //trace_log("on prend les taches client");
            $resultClient = $this->model->tasks();

            if ($attributes['state'] ?? false) {
                $resultClient = $resultClient->whereIn('state', $attributes['state']);
            }

            if ($attributes['task_type'] ?? false) {
                $resultClient = $resultClient->whereHas('task_type', function ($query) use ($attributes) {
                    $query->whereIn('id', $attributes['task_type']);
                });
            }
            
            //trace_log($resultClient);
            $globalResult = $globalResult->merge($resultClient->get()->toArray());
        }
        if ($attributes['task_from'] == 'all' || $attributes['task_from'] == 'projets') {
            $projets = $this->model->projects();

            if ($attributes['state'] ?? false) {
                $projets = $projets->whereIn('state', $attributes['state']);
            }

            if ($attributes['task_type'] ?? false) {
                $projets = $projets->whereHas('task_type', function ($query) use ($attributes) {
                    $query->whereIn('id', $attributes['task_type']);
                });
            }
            //trace_log("on prend les taches des projets" . $projets->count());
            foreach ($projets->get() as $projet) {
                //trace_log($projet->name);
                $result = $projet->tasks->toArray();
                //trace_log($result);
                $globalResult = $globalResult->merge($result);
            }
        }
        return $globalResult->sortBy('start_at');

    }

    public function getTaskState() {
        $taskModel = new \Waka\Tasker\Models\Task();
        //trace_log($taskModel);
        return $taskModel->listAllWorklowstate();
    }

    public function getProjectState() {
        $projectModel = new \Wcli\Crm\Models\Project();
        return $projectModel->listAllWorklowstate();
    }

}
