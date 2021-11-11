<?php namespace Wcli\Crm\WakaRules\Fncs;

use Waka\Utils\Classes\Rules\FncBase;
use Waka\Utils\Interfaces\Fnc as FncInterface;

class Gammes extends FncBase implements FncInterface
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
            'name'        =>  'Gammes',
            'description' => 'description des gammes ',
            'icon'        => 'icon-dollar',
            'premission'  => 'wcli.utils.fnc.edit.admin',
        ];
    }

    public function fncBridges()
    {
        return [
            'client'        => [
                'Wcli\Crm\Models\Client',
            ],
            'contact'        => [
                'Wcli\Crm\Models\Contact',
            ],
            'commercial'        => [
                'Wcli\Crm\Models\Commercial',
            ],
        ];
    }
    

    public function getText()
    {
        return "Liste des gammes";
    }

    public function listGammes() {
        return \Wcli\Crm\Models\Gamme::lists('name', 'id');
    }
    
    public function resolve($modelSrc, $poductorDs, $context="twig") {
        $gammes = null;
        if ($gammes = $this->getConfig('gammes')) {
            $gamme =  \Wcli\Crm\Models\Gamme::whereIn('id', $gammes)->get();
        } else {
            $gamme =  \Wcli\Crm\Models\Gamme::get();
        }
        return $gamme->toArray();
    }
}
