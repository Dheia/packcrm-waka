<?php namespace Wcli\Crm\Models;

use Model;

/**
 * client Model
 */

class Client extends Model
{
    use \Winter\Storm\Database\Traits\Validation;
    use \Waka\Utils\Classes\Traits\ScopePeriodes;
    use \Waka\Segator\Classes\Traits\TagTrait;
    use \Waka\Utils\Classes\Traits\DbUtils;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'wcli_crm_clients';


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
        'slug' => 'required|unique',
    ];

    public $customMessages = [
    ];

    /**
     * @var array attributes send to datasource for creating document
     */
    public $attributesToDs = [
        'nb_projet_running',
        'total_projet_running',
        'nb_projet_prepare',
        'total_projet_prepare',
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
        'contacts' => [
            'Wcli\Crm\Models\Contact',
            'delete' => true
        ],
        'projets' => [
            'Wcli\Crm\Models\Projet',
            'delete' => true
        ],
    ];
    public $hasOneThrough = [
    ];
    public $hasManyThrough = [
    ];
    public $belongsTo = [
       'commercial' => ['Backend\Models\User'],
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
    public function listUser() {
        $users = \Backend\Models\User::get();
        //fonction dans dbUtils
        return $this->CollectionConcatId($users);
    }

    /**
     * GETTERS
     **/
    public function getNbprojetAttribute() {
        
    }

    public function getTotalprojetAttribute() {
        
    }

     public function getNbProjetRunningAttribute() {
        return $this->projets->count();

    }

    public function getTotalProjetRunningAttribute() {
        return $this->projets->sum('total_ht');
    }

    public function getNbProjetPrepareAttribute() {
        return $this->projets->count();
    }

    public function getTotalProjetPrepareAttribute() {
        return $this->projets->sum('total_ht');
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
    public function filterFields($fields, $context = null)
    {
        
    }


    /**
     * OTHERS
     */

//endKeep/
}