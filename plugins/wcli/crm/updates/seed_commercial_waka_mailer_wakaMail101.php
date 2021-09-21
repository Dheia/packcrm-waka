<?php namespace Wcli\Crm\Models;

use Seeder;



class SeedCommercialWakaMailerWakaMail101 extends Seeder
{
    public function run()
    {
        \Waka\Mailer\Models\WakaMail::where('data_source', 'commercial')->delete();;
            
        $inject = \Waka\Mailer\Models\WakaMail::create([
                'name' => 'Bilan (commercial)',
                'slug' => 'wcli.crm::commercial_bilan',
                'subject' => '{{ds.name}} bilan de vos ventes',
                'no_ds' => 0,
                'data_source' => 'commercial',
                'layout_id' => 1,
                'is_mjml' => 0,
                'mjml' => '',
                'mjml_html' => null,
                'html' => '<p>Bonjour {{ ds.name }},</p>
{{asks.intro|raw}}
<p>Votre progression : <span class="w-bigger" style="color:{% if ds.progression < 0 %}red{% else %}green{% endif %}">{{ ds.progression }} %</span><br>
<p class="w-small">Cumul CA n : {{ds.cumul|number_format(2,\',\',\' \')}} €<br>
Cumul CA n-1 : {{ds.cumuln1|number_format(2,\',\',\' \')}} €
</p>
<p>Comparatif de vos ventes entre N et N-1</p>
{%for row in FNC.chart1%}
<img src="{{row.chart.path}}" alt="Graphique"/>
{%endfor%}

<p>Achats de vos clients importants : </p>
<ul>
{%for row in FNC.clientsventes%}
<li><b>{{ row.name }}</b><ul>
<li>Cumul : {{row.cumul|number_format(2,\',\',\' \')}} €</li>
<li>Cumul N-1 : {{row.cumuln1|number_format(2,\',\',\' \')}} €</li>
<li><span style="color:{% if row.progression < 0 %}red{% else %}green{% endif %}">Progression : {{row.progression|number_format(2,\',\',\' \')}} %</span></li>
</ul></li>
{%endfor%}
</ul>',
                'model_functions' => [
                    [
                        'name' => 'Graphique comparatif',
                        'collectionCode' => 'chart1',
                        'width' => '600',
                        'height' => '300',
                        'chartType' => 'bar',
                        'periode' => 'y_1_to_d',
                        'periode2' => 'y_to_d',
                        'beginAtZero' => '0',
                        'color' => 'secondary',
                        'functionCode' => 'chart1'
                    ],
                    [
                        'name' => 'Les ventes de vos clients',
                        'collectionCode' => 'clientsventes',
                        'tag' => [
                            '3'
                        ],
                        'column' => '',
                        'calcul' => '=',
                        'valeur' => '',
                        'functionCode' => 'clientsVentes'
                    ]
                ],
                'images' => null,
                'is_scope' => 0,
                'scopes' => null,
                'sort_order' => 3,
                'deleted_at' => null,
                'created_at' => '2021-06-23 10:21:51',
                'updated_at' => '2021-09-07 09:21:12',
                'test_id' => '1',
                'pjs' => null,
                'has_asks' => 1,
                'asks' => [
                    [
                        'code' => 'intro',
                        'is_asked' => '1',
                        'content' => '<p>Vous trouverez votre bilan du mois prescedent.&nbsp;</p>
',
                        '_group' => 'richeditor'
                    ]
                ],
                'is_lot' => 1
            ]);
        $inject = \Waka\Mailer\Models\WakaMail::create([
                'name' => 'Liste des ventes',
                'slug' => 'liste-des-ventes',
                'subject' => 'Liste des ventes du mois en cours',
                'no_ds' => 0,
                'data_source' => 'commercial',
                'layout_id' => 1,
                'is_mjml' => 0,
                'mjml' => '',
                'mjml_html' => null,
                'html' => '<p>Bonjour {{ ds.name }}</p>
{{ asks.intro|raw }}

{% if FNC.ventes %}
<ul>
{%for row in FNC.ventes%}
<li>{{ row.name }} <b>{{ row.client.name }}</b>| date {{row.sale_at | localeDate(\'date\')}} | montant {{row.amount|number_format(2,\',\',\' \')}} €</li>
{%endfor%}
</ul>
{% else %}
<p>Aucune Vente sur la période</p>
{% endif %}',
                'model_functions' => [
                    [
                        'name' => 'Tous les ventes de ses clients',
                        'collectionCode' => 'ventes',
                        'periode' => 'm',
                        'functionCode' => 'ventes'
                    ]
                ],
                'images' => null,
                'is_scope' => 0,
                'scopes' => null,
                'sort_order' => 8,
                'deleted_at' => null,
                'created_at' => '2021-09-07 08:15:06',
                'updated_at' => '2021-09-07 11:51:27',
                'test_id' => '3',
                'pjs' => null,
                'has_asks' => 1,
                'asks' => [
                    [
                        'code' => 'intro',
                        'is_asked' => '1',
                        'content' => '<p>Vos ventes du mois en cours</p>
',
                        '_group' => 'richeditor'
                    ]
                ],
                'is_lot' => 1
            ]);
 
    }

}
