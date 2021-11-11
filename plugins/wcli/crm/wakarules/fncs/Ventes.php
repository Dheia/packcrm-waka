<?php namespace Wcli\Crm\WakaRules\Fncs;

use Waka\Utils\Classes\Rules\FncBase;
use Waka\Utils\Interfaces\Fnc as FncInterface;

class Ventes extends FncBase implements FncInterface
{
    use \Waka\Utils\Classes\Traits\ScopePeriodes;

    /**
     * Returns information about this event, including name and description.
     */

    public $jsonable = ['gammes'];
    //
    public function fncDetails()
    {
        return [
            'name'        =>  'Ventes',
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
                'relation' => 'ventes'
            ],
            'client'        => [
                'Wcli\Crm\Models\Client',
                'relation' => 'ventes',
            ],
            'contact'        => [
                'Wcli\Crm\Models\Client',
                'relation' => 'client.ventes',
            ],
        ];
    }


    public function getText()
    {
        return "Liste des ventes";
    }

    public function listGammes() {
        return \Wcli\Crm\Models\Gamme::lists('name', 'id');
    }
    
    public function resolve($modelSrc, $poductorDs) {
        $query = $this->getBridgeQuery($modelSrc, $poductorDs);
        
        //
        //trace_log($query->get()->toArray());
        if ($periode = $this->getConfig('periode')) {
            $query = $query->wakaPeriode($periode, 'sale_at');
        }
        if ($gammes = $this->getConfig('gammes')) {
            $query = $query->whereIn('gamme_id', $gammes);
        }
        $query = $query->orderby('sale_at', 'asc')->with('client', 'gamme')->get();
        return $query->toArray();
    }
}
