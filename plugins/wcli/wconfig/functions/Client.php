<?php

namespace Wcli\Wconfig\Functions;

use Winter\Storm\Support\Collection;
use Waka\Utils\Classes\FunctionsBase;

class Client extends FunctionsBase
{
    public $model;
    use \Waka\Utils\Classes\Traits\ScopePeriodes;

    public function ventes($attributes)
    {
        $result = $this->model->ventes();

        if ($attributes['periode'] ?? false) {
            $result = $result->wakaPeriode($attributes['periode'], 'sale_at');
        }
        $result = $result->orderby('sale_at', 'asc')->get();

        return $result->toArray();
    }

    

    // public function getTaskState() {
    //     $taskModel = new \Waka\Tasker\Models\Task();
    //     //trace_log($taskModel);
    //     return $taskModel->listAllWorklowstate();
    // }

    // public function getProjectState() {
    //     $projectModel = new \Wcli\Crm\Models\Project();
    //     return $projectModel->listAllWorklowstate();
    // }

}
