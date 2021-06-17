<?php namespace Wcli\Crm\Models;

use Model;

/**
 * commercial Model
 */

class Commercial extends Model
{
    use \Winter\Storm\Database\Traits\Validation;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'wcli_crm_commercials';


    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

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
        $this->name = $this->first_name.' '.$this->last_name;
    }

    public function afterSave() 
    {

    }


    /**
     * LISTS
     **/

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

    /**
     * OTHERS
     */

    //endKeep/
}