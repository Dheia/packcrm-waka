<?php namespace Wcli\Crm\Models;

use Model;

/**
 * gamme Model
 */

class Gamme extends Model
{
    use \Winter\Storm\Database\Traits\Validation;
    use \Winter\Storm\Database\Traits\NestedTree;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'wcli_crm_gammes';


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
        'slug' => 'unique',
    ];

    public $customMessages = [
    ];

    /**
     * @var array attributes send to datasource for creating document
     */
    public $attributesToDs = [
        'nb_produits',
        'montant_produits',
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
        'projetProduits' => ['Wcli\Crm\Models\ProjetProduit'],
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
        'image' => [
            'System\Models\File',
            'delete' => true
        ],
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

    /**
     * GETTERS
     **/


    /**
     * SCOPES
     */
    public function getNbProduitsAttribute() {
        return $this->projetProduits()->whereHas('projet', function($q){
            $q->validated();
        })->sum('qty');
    }
    public function getMontantProduitsAttribute() {
        return $this->projetProduits()->whereHas('projet', function($q){
            $q->validated();
        })->sum('total_ht');
    }

    /**
     * SETTERS
     */
 
    /**
     * FILTER FIELDS
     */

    /**
     * OTHERS
     */
    public function getThisParentValue($value)
    {
        if ($this->{$value}) {
            return $this->{$value};
        } else {
            $parents = $this->getParents()->sortByDesc('nest_depth');
            foreach ($parents as $parent) {
                if ($parent->{$value} != null) {
                    return $parent->{$value};
                }
            }
        }
    }

//endKeep/
}