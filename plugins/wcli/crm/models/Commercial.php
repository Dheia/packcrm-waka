<?php namespace Wcli\Crm\Models;

use Model;

/**
 * commercial Model
 */

class Commercial extends Model
{
    use \Winter\Storm\Database\Traits\Validation;
    use \Waka\Utils\Classes\Traits\ScopePeriodes;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'wcli_crm_commercials';


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
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|unique',
    ];

    public $customMessages = [
    ];

    /**
     * @var array attributes send to datasource for creating document
     */
    public $attributesToDs = [
        'venteMois',
        'ventesTotal',
        'venteAnnee',
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
    public $hasOne = [];
    public $hasMany = [
        'clients' => [
            'Wcli\Crm\Models\Client'
        ],
        'contacts' => [
            'Wcli\Crm\Models\Contact'
        ],
    ];
    public $hasOneThrough = [
    ];
    public $hasManyThrough = [
        'ventes' => [
            'Wcli\Crm\Models\Vente',
            'through' => 'Wcli\Crm\Models\Client'
        ],
    ];
    public $belongsTo = [
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
    public function beforeSave() 
    {
        trace_log($this->ventes->toArray());
        
    }

    public function beforeValidate() 
    {
        $this->name = $this->first_name.' '.$this->last_name;
    }


    /**
     * LISTS
     **/

    /**
     * GETTERS
     **/
    public function getVenteMoisAttribute()
    {
        return $this->ventes()->wakaPeriode('d_30', 'sale_at')->sum('amount');
    }
    public function getVentesTotalAttribute()
    {
        return $this->ventes()->sum('amount');
    }
    public function getVenteAnneeAttribute()
    {
        return $this->ventes()->wakaPeriode('y', 'sale_at')->sum('amount');
    }
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