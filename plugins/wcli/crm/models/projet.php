<?php namespace Wcli\Crm\Models;

use Model;

/**
 * projet Model
 */

class Projet extends Model
{
    use \Winter\Storm\Database\Traits\Validation;
    use \Waka\Utils\Classes\Traits\ScopePeriodes;
    use \Waka\Utils\Classes\Traits\DbUtils;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'wcli_crm_projets';


    /**
     * @var array Guarded fields
     */
    protected $guarded = ['id'];

    /**
     * @var array Fillable fields
     */
    //protected $fillable = [];

    /**
     * @var array Validation rules for attributes
     */
    public $rules = [
        'name' => 'required',
        'code' => 'required',
        'state' => 'required',
        'client' => 'required',
        'sale_at' => 'required',
    ];

    public $customMessages = [
    ];

    /**
     * @var array attributes send to datasource for creating document
     */
    public $attributesToDs = [
        'tva',
        'total_ttc',
        'total_remise',
        'total_avant_remise',
    ];

    /**
     * @var array Attributes to be cast to native types
     */
    protected $casts = [];

    /**
     * @var array Attributes to be cast to JSON
     */
    protected $jsonable = [
    ];

    /**
     * @var array Attributes to be appended to the API representation of the model (ex. toArray())
     */
    protected $appends = [
    ];

    /**
     * @var array Attributes to be removed from the API representation of the model (ex. toArray())
     */
    protected $hidden = [];

    /**
     * @var array Attributes to be cast to Argon (Carbon) instances
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'sale_at',
    ];

    /**
     * @var array Relations
     */
    public $hasOne = [
    ];
    public $hasMany = [
        'projetProduits' => [
            'Wcli\Crm\Models\ProjetProduit',
            'delete' => true
        ],
    ];
    public $hasOneThrough = [
    ];
    public $hasManyThrough = [
    ];
    public $belongsTo = [
       'client' => ['Wcli\Crm\Models\Client'],
       'commercial' => [
            'Backend\Models\User',
            'key' => 'commercial_id'
        ],
       'contact' => ['Wcli\Crm\Models\Contact'],
    ];
    public $belongsToMany = [
    ];        
    public $morphTo = [];
    public $morphOne = [
    ];
    public $morphMany = [
    ];
    public $attachOne = [
    ];
    public $attachMany = [
    ];

    //startKeep/

    /**
     *EVENTS
     **/
    public function beforeValidate() {
        if(!$this->code) {
            $id = $this->getNextStringId(6);
            $this->code = "P_".$id;
        }
        if(!$this->state) {
            $this->state = 'Brouillon';
        }
    }

    public function beforeSave() {
        trace_log('beforeSave');
        $this->total_ht = $this->projetProduits()->sum('total_ht');
    }

    /**
     * LISTS
     **/
    public function listClientContact() {
        //trace_log($this->client->toArray());
        if($this->client) {
            return $this->client->contacts()->lists('name', 'id');
        } else {
            return Contact::lists('name', 'id');
        }
    }

    public function listUser() {
        $users = \Backend\Models\User::get();
        //fonction dans dbUtils
        return $this->CollectionConcatId($users);
    }

    public function listState() {
        $states =  Settings::get('projetState');
        trace_log($states);
        $stateArray = [];
        foreach($states as $key=>$state) {
            $stateArray[$state['code']] = $state['code'];
        }
        return $stateArray;
    }

    /**
     * GETTERS
     **/
    public function getTotalTtcAttribute() {
        return $this->total_ht + $this->tva;;
    }

    public function getTotalRemiseAttribute() {
        $produits = $this->projetProduits;
        $totalRemise = 0;
        foreach($produits as $produit) {
            if($produit['total_ht'] < 0 ) {
                $totalRemise += $produit['total_ht'];
            }
            
        }
        return $totalRemise;
    }

    public function getTotalAvantRemiseAttribute() {
        return $this->total_ht + $this->totalRemise*-1; 
    }
    public function getTvaAttribute() {
        $produits = $this->projetProduits;
        $totalTva = 0;
        foreach($produits as $produit) {
            $totalTva += $produit['total_ht'] * $produit['tva']/1000 - $produit['total_ht'];
        }
        return $totalTva;

    }

    /**
     * SCOPES
     */
    public function scopeNotSigned($query) {
        return $query->whereIn('state', ['Brouillon', 'En Proposition']);
    }
    public function scopeValidated($query) {
        return $query->whereIn('state', ['Validé', 'Gelé']);
    }
    public function scopeActive($query) {
        return $query->whereIn('state', ['Brouillon', 'En Proposition', 'Validé', 'Gelé']);
    }
    public function scopeLost($query) {
        return $query->whereIn('state', ['Perdu']);
    }
    public function scopeNotActive($query) {
        return $query->whereIn('state', ['Terminé', 'Abandon']);
    }
    public function scopeLate($query) {
        $lastMonth = \Carbon\Carbon::now()->subMonth();
        return $query->whereIn('state', ['Brouillon', 'En Proposition'])->where('updated_at', '<', $lastMonth);
    }

    /**
     * SETTERS
     */
 
    /**
     * FILTER FIELDS
     */
    public function filterFields($fields, $context = null)
    {
        // if (isset($fields->client) && isset($fields->contact)) {
        //     if($fields->client->value) {
        //         $fields->contact
        //     }
        // }
    }
    

    /**
     * OTHERS
     */

//endKeep/
}
