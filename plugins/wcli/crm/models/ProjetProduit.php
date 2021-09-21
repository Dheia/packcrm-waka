<?php namespace Wcli\Crm\Models;

use Model;

/**
 * projetProduit Model
 */

class ProjetProduit extends Model
{
    use \Winter\Storm\Database\Traits\Validation;
    use \Winter\Storm\Database\Traits\Sortable;
    use \Waka\Utils\Classes\Traits\ScopePeriodes;
    use \Waka\Segator\Classes\Traits\TagTrait;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'wcli_crm_projet_produits';


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
        'cu' => 'required',
        'qty' => 'required',
        'tva' => 'required',
    ];

    public $customMessages = [
    ];

    /**
     * @var array attributes send to datasource for creating document
     */
    public $attributesToDs = [
        'tva_m',
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
    ];

    /**
     * @var array Relations
     */
    public $hasOne = [
    ];
    public $hasMany = [
    ];
    public $hasOneThrough = [
    ];
    public $hasManyThrough = [
    ];
    public $belongsTo = [
       'projet' => ['Wcli\Crm\Models\Projet'],
       'gamme' => ['Wcli\Crm\Models\Gamme'],
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
    public function beforeValidate()
    {

    }

    public function beforeSave() 
    {

    }


    /**
     * LISTS
     **/
    public function listTva()
    {
        $tvas = Settings::get('tvas');
        $arrayTva = [];
        foreach($tvas as $tva ) {
            $arrayTva[$tva['calcul']] = $tva['name'];
        }
        return $arrayTva;
    }

    /**
     * GETTERS
     **/

    /**
     * SCOPES
     */

    /**
     * SETTERS
     */
 
    /**
     * FILTER FIELDS
     */
    public function filterFields($fields, $context = null)
    {
        //trace_log("filterFields");
        if (isset($fields->qty)  && isset($fields->cu) && isset($fields->tva) && isset($fields->total_ht)) {
            //trace_log($fields->qty->value);
            $fields->total_ht->value = floatval($fields->qty->value) * floatval($fields->cu->value);
        }
    }

    /**
     * OTHERS
     */

//endKeep/
}