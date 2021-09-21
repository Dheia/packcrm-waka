<?php namespace Wcli\Crm\Models;

use Seeder;



class SeedContactWakaMailerWakaMail101 extends Seeder
{
    public function run()
    {
        \Waka\Mailer\Models\WakaMail::where('data_source', 'contact')->delete();;
            
        $inject = \Waka\Mailer\Models\WakaMail::create([
                'name' => 'hello (démonstration)',
                'slug' => 'wcli.crm::hello',
                'subject' => 'Hello {{ds.name}}',
                'no_ds' => 0,
                'data_source' => 'contact',
                'layout_id' => 1,
                'is_mjml' => 0,
                'mjml' => '',
                'mjml_html' => null,
                'html' => '<p>Bonjour {{ ds.name }},</p>
<p>{{ asks.intro }}</p>
<p>{{ asks.intro_fixe }}</p>
<p>{{ asks.intro_htm| raw }}</p>',
                'model_functions' => null,
                'images' => null,
                'is_scope' => 0,
                'scopes' => null,
                'sort_order' => 1,
                'deleted_at' => null,
                'created_at' => '2021-06-23 10:21:51',
                'updated_at' => '2021-07-01 16:37:04',
                'test_id' => '3',
                'pjs' => null,
                'has_asks' => 1,
                'asks' => [
                    [
                        'code' => 'intro',
                        'is_asked' => '1',
                        'content' => 'Ceci est une intro qui sera éditable lors de la création d\'un email. Si le contenu n\'est pas accessible (exemple lors d\'un envoi par lot) les valeurs par défaut seront utilisés. il est possible d\'ajouter des élements identiques ex le nom : {{ ds.name }}, le nom du secteur de la société du contact {{ ds.client.secteur.name }}',
                        '_group' => 'textarea'
                    ],
                    [
                        'code' => 'intro_fixe',
                        'is_asked' => '0',
                        'content' => 'Ce pavé est éditable uniquement dans l\'email. il peut aussi emporter des éléments dynamiques : nom du client  {{ ds.client.name }}',
                        '_group' => 'textarea'
                    ],
                    [
                        'code' => 'intro_htm',
                        'is_asked' => '1',
                        'content' => '<p>Une <strong>intro</strong> en htm <strong>{{ ds.commercial.name }}</strong></p>

<p>sdsddsds</p>
',
                        '_group' => 'richeditor'
                    ]
                ],
                'is_lot' => 1
            ]);
        $inject = \Waka\Mailer\Models\WakaMail::create([
                'name' => 'liste des ventes N (contact)',
                'slug' => 'wcli.crm::contact_ventes',
                'subject' => 'liste de vos commandes : {{ ds.client.name }}',
                'no_ds' => 0,
                'data_source' => 'contact',
                'layout_id' => 1,
                'is_mjml' => 0,
                'mjml' => '',
                'mjml_html' => null,
                'html' => '<p><strong>{{ asks.titre}}</strong></p>
<p>{{asks.intro}}</p>
<p>{%for row in FNC.ventes%}  </p>
<ul>
<li>{{ row.name }} | client : {{ row.client.name }}<br>
{{row.sale_at | localeDate(\'date-short\')}} | Montant : {{row.amount|number_format(2,\',\',\' \')}} €< | Gamme : {{ row.gamme.name }}</li>
</ul>
<p>{%endfor%}</p>
{{ asks.signature | raw }}',
                'model_functions' => [
                    [
                        'name' => 'Liste des ventes du client du contact',
                        'collectionCode' => 'ventes',
                        'periode' => 'y',
                        'functionCode' => 'ventes'
                    ]
                ],
                'images' => null,
                'is_scope' => 0,
                'scopes' => null,
                'sort_order' => 2,
                'deleted_at' => null,
                'created_at' => '2021-06-23 10:21:51',
                'updated_at' => '2021-09-07 11:49:08',
                'test_id' => '1',
                'pjs' => null,
                'has_asks' => 1,
                'asks' => [
                    [
                        'code' => 'titre',
                        'is_asked' => '1',
                        'content' => 'Bonjour {{ ds.name }}',
                        '_group' => 'label'
                    ],
                    [
                        'code' => 'intro',
                        'is_asked' => '1',
                        'content' => 'Voici la liste de vos commandes des 30 derniers jours',
                        '_group' => 'textarea'
                    ],
                    [
                        'code' => 'signature',
                        'is_asked' => '1',
                        'content' => '<p><strong>Cordialement,</strong>
	<br>{{ ds.commercial.name }}
	<br>{{ ds.commercial.tel }}</p>
',
                        '_group' => 'richeditor'
                    ]
                ],
                'is_lot' => 1
            ]);
        $inject = \Waka\Mailer\Models\WakaMail::create([
                'name' => 'Liste des ventes de la gamme A',
                'slug' => 'wcli.crm::vente_a',
                'subject' => 'liste des ventes : {{ ds.client.name }}',
                'no_ds' => 0,
                'data_source' => 'contact',
                'layout_id' => 1,
                'is_mjml' => 0,
                'mjml' => '',
                'mjml_html' => null,
                'html' => '<p><strong>{{ asks.titre}}</strong></p>
<p>{{asks.intro}}</p>
<p>{%for row in FNC.ventes%}  </p>
<ul>
<li>{{ row.name }} | Gamme : {{ row.gamme.name }}<br>
{{row.sale_at | localeDate(\'date-short\')}} | Montant : {{row.amount|number_format(2,\',\',\' \')}} €</li>
</ul>
<p>{%endfor%}</p>
{{ asks.signature | raw }}',
                'model_functions' => [
                    [
                        'name' => 'Liste des ventes du client du contact',
                        'collectionCode' => 'ventes',
                        'periode' => 'y',
                        'gamme' => [
                            '4',
                            '5',
                            '6'
                        ],
                        'functionCode' => 'ventes'
                    ]
                ],
                'images' => null,
                'is_scope' => 0,
                'scopes' => null,
                'sort_order' => 2,
                'deleted_at' => null,
                'created_at' => '2021-08-30 14:25:04',
                'updated_at' => '2021-09-07 11:50:27',
                'test_id' => '1',
                'pjs' => null,
                'has_asks' => 1,
                'asks' => [
                    [
                        'code' => 'titre',
                        'is_asked' => '1',
                        'content' => 'Bonjour {{ ds.name }}',
                        '_group' => 'label'
                    ],
                    [
                        'code' => 'intro',
                        'is_asked' => '1',
                        'content' => 'Voici la liste de vos ventes des 30 derniers jours sur la gamme A',
                        '_group' => 'textarea'
                    ],
                    [
                        'code' => 'signature',
                        'is_asked' => '1',
                        'content' => '<p><strong>Cordialement,</strong>
	<br>{{ ds.commercial.name }}
	<br>{{ ds.commercial.tel }}</p>
',
                        '_group' => 'richeditor'
                    ]
                ],
                'is_lot' => 1
            ]);
        $inject = \Waka\Mailer\Models\WakaMail::create([
                'name' => 'Bilan client pour un contact',
                'slug' => 'wcli::crm.contact.bilan',
                'subject' => 'Présentation de notre gamme de produits',
                'no_ds' => 0,
                'data_source' => 'contact',
                'layout_id' => 1,
                'is_mjml' => 0,
                'mjml' => '',
                'mjml_html' => null,
                'html' => '<p>Bonjour {{ ds.name }},</p>
{{asks.intro|raw}}
<p>Progression de votre volume d\'achat : <span class="w-bigger" style="color:{% if ds.client.progression < 0 %}red{% else %}green{% endif %}">{{ ds.client.progression }} %</span><br>
<p class="w-small">Cumul CA n : {{ds.client.cumul|number_format(2,\',\',\' \')}} €<br>
Cumul CA n-1 : {{ds.client.cumuln1|number_format(2,\',\',\' \')}} €
</p>
<p>Comparatif de vos achats entre N et N-1</p>
{%for row in FNC.chart1%}
<img src="{{row.chart.path}}" alt="Graphique"/>
{%endfor%}

Vos dernières commandes : 
{% if FNC.ventes %}
<ul>
{%for row in FNC.ventes%}
<li>{{ row.name }} | date {{row.sale_at | localeDate(\'date\')}} | montant {{row.amount|number_format(2,\',\',\' \')}} €
{%endfor%}
</ul>
{% else %}
<p>Aucune Vente sur la période</p>
{% endif %}',
                'model_functions' => [
                    [
                        'name' => 'Tous les ventes du client',
                        'collectionCode' => 'ventes',
                        'periode' => 'd_30',
                        'functionCode' => 'ventes'
                    ],
                    [
                        'name' => 'Graphique comparatif',
                        'collectionCode' => 'chart1',
                        'width' => '600',
                        'height' => '300',
                        'chartType' => 'bar',
                        'periode' => 'y_to_d',
                        'periode2' => 'y_1_to_d',
                        'beginAtZero' => '1',
                        'color' => 'secondary',
                        'functionCode' => 'chart1'
                    ]
                ],
                'images' => null,
                'is_scope' => 0,
                'scopes' => null,
                'sort_order' => 5,
                'deleted_at' => null,
                'created_at' => '2021-09-02 14:25:54',
                'updated_at' => '2021-09-07 11:52:36',
                'test_id' => '2',
                'pjs' => null,
                'has_asks' => 0,
                'asks' => [],
                'is_lot' => 1
            ]);
        $inject = \Waka\Mailer\Models\WakaMail::create([
                'name' => 'Présentation des gammes',
                'slug' => 'wcli.crm::contact.gamme',
                'subject' => 'Présentation de notre gamme produits',
                'no_ds' => 0,
                'data_source' => 'contact',
                'layout_id' => 1,
                'is_mjml' => 0,
                'mjml' => '',
                'mjml_html' => null,
                'html' => '{{ ds.name }},

{%for row in FNC.gammes%}
<div class="w-mt-1">
{{ row.name }}
<div class="w-small">{{ row.description }}</div>
</div>
{%endfor%}',
                'model_functions' => [
                    [
                        'name' => 'Présentation des gammes',
                        'collectionCode' => 'gammes',
                        'gamme' => [
                            '4',
                            '5',
                            '6'
                        ],
                        'functionCode' => 'gammes'
                    ]
                ],
                'images' => null,
                'is_scope' => 0,
                'scopes' => null,
                'sort_order' => 6,
                'deleted_at' => null,
                'created_at' => '2021-09-02 14:27:50',
                'updated_at' => '2021-09-07 13:33:31',
                'test_id' => '2',
                'pjs' => null,
                'has_asks' => 0,
                'asks' => [],
                'is_lot' => 1
            ]);
 
    }

}
