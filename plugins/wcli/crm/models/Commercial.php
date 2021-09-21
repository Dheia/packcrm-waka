<?php namespace Wcli\Crm\Models;

use Model;
use Backend\Models\User as UserWinter;
/**
 * commercial Model
 */

class Commercial extends UserWinter
{
    use \Waka\Utils\Classes\Traits\ScopePeriodes;


    
    /**
     * @var array attributes send to datasource for creating document
     */
    public $attributesToDs = [
        'fullName',
        'nb_projet_running',
        'total_projet_running',
        'nb_projet_prepare',
        'total_projet_prepare',
        'nb_projet_retard',
    ];

    
    public $hasMany = [
        'clients' => ['Wcli\Crm\Models\Client', 'key' => 'commercial_id'],
        'contacts' => ['Wcli\Crm\Models\Contact', 'key' => 'commercial_id'],
        'projets' => ['Wcli\Crm\Models\Projet', 'key' => 'commercial_id'],
    ];

    //startKeep/

    /**
     *EVENTS
     **/
    public function beforeSave() 
    {
        //trace_log($this->ventes->toArray());
        
    }


    /**
     * LISTS
     **/

    /**
     * GETTERS
     **/
   

    public function getNbProjetRunningAttribute() {
        return $this->projets()->validated()->count();

    }

    public function getTotalProjetRunningAttribute() {
        return $this->projets()->validated()->sum('total_ht');
    }

    public function getNbProjetPrepareAttribute() {
        return $this->projets()->notSigned()->count();
    }

    public function getTotalProjetPrepareAttribute() {
        return $this->projets()->notSigned()->sum('total_ht');
    }

    public function getNbProjetRetardAttribute() {
        return $this->projets()->late()->count();
    }
    
    //
    
    /**
     * SCOPES
     */

    /**
     * SETTERS
     */
 
    /**
     * FILTER FIELDS
     */

    /**
     * OTHERS
     */

    //endKeep/
}
