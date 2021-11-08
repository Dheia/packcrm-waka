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
        'total_ventes',
        'total_ventes_n',
        'total_ventes_m',
        'cumul',
        'cumuln1',
        'progression',
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
        'ventes' => [
            'Wcli\Crm\Models\Vente',
            'delete' => true
        ],
    ];
    public $hasOneThrough = [
    ];
    public $hasManyThrough = [
    ];
    public $belongsTo = [
       'commercial' => ['Wcli\Crm\Models\Commercial'],
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

    /**
     * GETTERS
     **/
    public function getTotalVentesAttribute() {
        return $this->ventes()->sum('amount');
    }
    public function getTotalVentesNAttribute() {
        return $this->ventes()->wakaPeriode('y', 'sale_at')->sum('amount');
    }
    public function getTotalVentesMAttribute() {
        return $this->ventes()->wakaPeriode('m', 'sale_at')->sum('amount');
    }
    //
    public function getVentesByGammes($periode) {
        if(!$periode) {
            throw new \SystemException('variable periode est null');
        }
        $sales = $this->ventes()->wakaPeriode($periode, 'sale_at');
        if(!$sales) {
            return null;
        }
        $sales =  $sales->select('gamme_id', \Db::raw('COUNT(*) as value'))
            ->groupBy('gamme_id')->get();
        $sales = $sales->map(function ($item, $key)  {
            $mapped = [];
            if ($item['gamme_id'] != 'autres') {
                $mapped['labels'] = Gamme::find($item['gamme_id'])->name;
            }
            $mapped['value'] = $item['value'];
            return $mapped;
        });
        return $sales;

    }
    public function getVentesByGammesLabels($attributes) {
        $periode = $attributes['periode'];
        $sales =  $this->getVentesByGammes($periode);
        if(!$sales) {
            return [];
        }
        return $sales->pluck('labels')->toArray();
    }
    public function getVentesByGammesValue($attributes) {
        $periode = $attributes['periode'];
        $sales =  $this->getVentesByGammes($periode);
        if(!$sales) {
            return [];
        }
        return $sales->pluck('value')->toArray();
    }
    //
    public function getVentesByMonth($periode) {
        $sales = $this->ventes()->wakaPeriode($periode, 'sale_at');
        $sales =  $sales->select(\Db::raw('SUM(amount) as value'), \DB::raw('MONTH(sale_at) month'), \DB::raw('YEAR(sale_at) year'))
            ->groupBy('year','month')->get();
        return $sales;
    }
    public function getVentesByMonthLabel($attributes) {
        $periode = $attributes['periode'];
        $sales =  $this->getVentesByMonth($periode);
        if(!$sales) {
            return [];
        }
        trace_log($sales->pluck('month')->toArray());
        return $sales->pluck('month')->toArray();
    }
    public function getVentesByMonthValue($attributes) {
        $periode = $attributes['periode'];
        $sales =  $this->getVentesByMonth($periode);
        if(!$sales) {
            return [];
        }
        trace_log($sales->pluck('value')->toArray());
        return $sales->pluck('value')->toArray();
    }

    public function getVentesByMonthN1Value($attributes) {
        $periode2 = $attributes['periode2'];
        $sales =  $this->getVentesByMonth($periode2);
        if(!$sales) {
            return [];
        }
        return $sales->pluck('value')->toArray();
    }

    public function getCumulAttribute() {
        return  $this->ventes()->wakaPeriode('y_to_d','sale_at')->sum('amount');
    }
    public function getCumuln1Attribute() {
        return  $this->ventes()->wakaPeriode('y_1_to_d', 'sale_at')->sum('amount');
    }
    public function getProgressionAttribute() {
        return round(($this->cumul - $this->cumuln1)/$this->cumuln1*100,2);
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
        if (!isset($fields->name)) {
            return;
        }
    }


    /**
     * OTHERS
     */

    //endKeep/
}