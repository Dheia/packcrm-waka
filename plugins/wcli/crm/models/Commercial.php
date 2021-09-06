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
        'clients' => ['Wcli\Crm\Models\Client'],
        'contacts' => ['Wcli\Crm\Models\Contact'],
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
        //trace_log($this->ventes->toArray());
        
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
    //
    //
    public function getVentesByGammes($periode) {
        if(!$periode) {
            throw new \SystemException('variable periode est null');
        }
        $sales = $this->ventes()->wakaPeriode($periode, 'sale_at');
        if(!$sales) {
            return null;
        }
        $sales =  $sales->select('gamme_id', \Db::raw('COUNT(gamme_id) as value'))
            ->groupBy('laravel_through_key','gamme_id')->get();
            trace_log($sales->toArray());
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
            ->groupBy('laravel_through_key', 'year','month')->get();
        return $sales;
    }
    public function getVentesByMonthLabel($attributes) {
        $periode = $attributes['periode'];
        $sales =  $this->getVentesByMonth($periode);
        if(!$sales) {
            return [];
        }
        return $sales->pluck('month')->toArray();
    }
    public function getVentesByMonthValue($attributes) {
        $periode = $attributes['periode'];
        $sales =  $this->getVentesByMonth($periode);
        if(!$sales) {
            return [];
        }
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
        $sales =  $this->getVentesByMonth('y_to_d');
        return $sales->sum('value');


    }
    public function getCumuln1Attribute() {
         $sales =  $this->getVentesByMonth('y_1_to_d');
        return $sales->sum('value');
    }
    public function getProgressionAttribute() {
        $salesn =  $this->getVentesByMonth('y_to_d')->sum('value');
        $salesn1 =  $this->getVentesByMonth('y_1_to_d')->sum('value');
        return round(($salesn - $salesn1)/$salesn1*100,2);
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