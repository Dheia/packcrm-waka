<?php namespace Wcli\Crm\WakaRules\Fncs;

use Waka\Utils\Classes\Rules\FncBase;
use Waka\Utils\Interfaces\Fnc as FncInterface;

class EtatClients extends FncBase implements FncInterface
{
    use \Waka\Utils\Classes\Traits\ScopePeriodes;

    /**
     * Returns information about this event, including name and description.
     */

    public $jsonable = ['tags'];
    //
    public function fncDetails()
    {
        return [
            'name'        =>  'Etats des ventes des clients',
            'description' => 'description des ventes ',
            'icon'        => 'icon-dollar',
            'premission'  => 'wcli.utils.fnc.edit.admin',
        ];
    }

    public function fncBridges()
    {
        return [
            'commercial'        => [
                'Wcli\Crm\Models\Commercial',
            ],
            'wakaUser'        => [
                'Wcli\Wconfig\Models\WakaUser',
                'relation' => "wakaAll"
            ],
        ];
    }


    public function getText()
    {
        //trace_log('getText HTMLASK---');
        $hostObj = $this->host;
        //trace_log($hostObj->config_data);
        $title = $hostObj->config_data['title'] ?? null;
        if($title) {
            return $title;
        }
        return parent::getText();
    }

    public function listGammes() {
        return \Wcli\Crm\Models\Gamme::lists('name', 'id');
    }

    public function getTagList()
    {
        return \Waka\Segator\Models\Tag::where('data_source', 'client')->lists('name', 'id');
    }
    


    public function resolve($modelSrc, $poductorDs) {
        $query = null;
        $testQuery = $this->getBridgeQuery($modelSrc, $poductorDs);
        // if ($tags = $this->getConfig('tags')) {
        //     $modelSrc = $modelSrc->clients()->tagFilter($tags);
        // } else {
        //      $modelSrc = $modelSrc->clients();
        // }
        // $modelSrc = $modelSrc->get();
        // $modelSrc =  $this->getAttributesDs($modelSrc);
        if($testQuery == 'wakaAll') {
            $query = \Wcli\Crm\Models\Client::class;
            if ($tags = $this->getConfig('tags')) {
                $query = $query::tagFilter($tags);
            } 
        } else {
            $query = $testQuery->clients();
            if ($tags = $this->getConfig('tags')) {
                $query = $query->tagFilter($tags);
            } 
        }

        

        $query = $query->get();
        $query =  $this->getAttributesDs($query);
        if($filter = $this->getConfig('is_filter_field')) {
            $query =  $this->rejectIf($query);
        }


        return [
            'title' => $this->getConfig('title'),
            'datas' => $query->toArray(),
            'show' => $query->count(),
        ];
    }

    public function rejectIf($collection) {
        $configs = $this->getConfigs();
        $collection =  $collection->reject(function ($item, $key) use($configs) {
                $field = $configs['field'];
                $calcul = $configs['calcul'];
                $valeur = $configs['valeur'];
                // trace_log($item[$field]);
                // trace_log($calcul);
                // trace_log($valeur);
                //trace_log(!$this->dynamic_comparison($item[$field], $calcul, $valeur));
                return !$this->dynamic_comparison($item[$field], $calcul, $valeur);
        });
        //trace_log($collection->pluck('name'));
        return $collection;
    }
}
