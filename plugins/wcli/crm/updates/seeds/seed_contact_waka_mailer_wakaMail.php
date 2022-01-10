<?php namespace Wcli\Crm\Models;

use Seeder;



class SeedContactWakaMailerWakaMail extends Seeder
{
    public function run()
    {
        $toDeletes = \Waka\Mailer\Models\WakaMail::where('data_source', 'contact')->get();
        foreach($toDeletes as $delete) {
                $delete->forceDelete();
        }
            
        $inject_0 = \Waka\Mailer\Models\WakaMail::create([
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
{{ asks.intro | raw }}
{{ asks.intro_fixe | raw }}',
                'sort_order' => 1,
                'deleted_at' => null,
                'created_at' => '2021-06-23 10:21:51',
                'updated_at' => '2021-12-23 17:58:57',
                'test_id' => '3',
                'pjs' => null,
                'is_lot' => 1,
                'state' => 'Actif',
                'auto_send' => 0,
                'has_log' => 1,
                'open_log' => 1,
                'click_log' => 1,
                'has_sender' => 0,
                'sender' => '',
                'reply_to' => '',
                'is_embed' => 1
            ]);
        

        $inject_0->rule_asks()->create([
                'code' => 'intro',
                'class_name' => '\\Waka\\Utils\\WakaRules\\Asks\\HtmlAsk',
                'config_data' => [
                    'html' => '<p>Ceci est une intro qui sera éditable lors de la création d\'un email. Si le contenu n\'est pas accessible (exemple lors d\'un envoi par lot) les valeurs par défaut seront utilisés. </p>

<p>Il est possible d\'ajouter des éléments dynamiques ex le nom : {{ ds.name }}, le nom du de la société rattaché au contact <strong>{{ ds.client.name }} </strong>et de son commercial :<strong> {{ ds.commercial.name }}</strong></p>',
                    'ask_emit' => '1',
                    'ask_text' => '<p>Ceci est une intro qui sera éditable lors de la création d\'un email. Si le contenu n\'est pas accessible (exemple lors d\'un envoi par lot) les valeurs par défaut seront utilisés. </p>

<p>Il est possible d\'ajouter des éléments dynamiques ex le nom : {{ ds.name }}, le nom du de la société rattaché au contact <strong>{{ ds.client.name }} </strong>et de son commercial :<strong> {{ ds.commercial.name }}</strong></p>'
                ],
                'created_at' => '2021-11-10 16:05:36',
                'updated_at' => '2021-12-27 16:49:38',
                'sort_order' => 33,
                'datas' => null,
                'html' => '<p>Ceci est une intro qui sera éditable lors de la création d\'un email. Si le contenu n\'est pas accessible (exemple lors d\'un envoi par lot) les valeurs par défaut seront utilisés. </p>

<p>Il est possible d\'ajouter des éléments dynamiques ex le nom : {{ ds.name }}, le nom du de la société rattaché au contact <strong>{{ ds.client.name }} </strong>et de son commercial :<strong> {{ ds.commercial.name }}</strong></p>',
                'ask_emit' => '1',
                'ask_text' => '<p>Ceci est une intro qui sera éditable lors de la création d\'un email. Si le contenu n\'est pas accessible (exemple lors d\'un envoi par lot) les valeurs par défaut seront utilisés. </p>

<p>Il est possible d\'ajouter des éléments dynamiques ex le nom : {{ ds.name }}, le nom du de la société rattaché au contact <strong>{{ ds.client.name }} </strong>et de son commercial :<strong> {{ ds.commercial.name }}</strong></p>'
            ]);
        $inject_0->rule_asks()->create([
                'code' => 'intro_fixe',
                'class_name' => '\\Waka\\Utils\\WakaRules\\Asks\\HtmlAsk',
                'config_data' => [
                    'html' => '<p>Ce pavé est éditable uniquement dans l\'email. il peut aussi emporter des éléments dynamiques : nom du client  {{ ds.client.name }}</p>',
                    'ask_emit' => '0',
                    'ask_text' => '<p>Ce pavé est éditable uniquement dans l\'email. il peut aussi emporter des éléments dynamiques : nom du client  {{ ds.client.name }}</p>'
                ],
                'created_at' => '2021-11-10 16:06:05',
                'updated_at' => '2021-12-27 16:49:38',
                'sort_order' => 34,
                'datas' => null,
                'html' => '<p>Ce pavé est éditable uniquement dans l\'email. il peut aussi emporter des éléments dynamiques : nom du client  {{ ds.client.name }}</p>',
                'ask_emit' => '0',
                'ask_text' => '<p>Ce pavé est éditable uniquement dans l\'email. il peut aussi emporter des éléments dynamiques : nom du client  {{ ds.client.name }}</p>'
            ]);
        $inject_0->rule_conditions()->create([
                'code' => null,
                'mode' => null,
                'class_name' => '\\Waka\\Utils\\WakaRules\\Conditions\\ModelExist',
                'data_source' => null,
                'config_data' => [
                    'mode' => null,
                    'field' => 'email',
                    'relation' => '',
                    'rule_text' => 'Verification existance valeur : R= | M= | F=*'
                ],
                'created_at' => '2021-12-27 16:49:27',
                'updated_at' => '2021-12-27 16:49:38',
                'sort_order' => 2,
                'datas' => null,
                'field' => 'email',
                'relation' => '',
                'rule_text' => 'Verification existance valeur : R= | M= | F=*'
            ]);
        $inject_0->save();

        $inject_1 = \Waka\Mailer\Models\WakaMail::create([
                'name' => 'liste des ventes N (contact)',
                'slug' => 'wcli.crm::contact_ventes',
                'subject' => 'liste de vos commandes : {{ ds.client.name }}',
                'no_ds' => 0,
                'data_source' => 'contact',
                'layout_id' => 1,
                'is_mjml' => 0,
                'mjml' => '',
                'mjml_html' => null,
                'html' => '{{asks.intro | raw }}
{% if fncs.ventes.show %}
<p><b>{{ fncs.ventes.title }}</b></p>
{%for row in fncs.ventes.datas %}
<li>{{ row.name }} | client : {{ row.client.name }}<br>{{row.sale_at | localeDate(\'date-short\')}} | Montant : {{row.amount|number_format(2,\',\',\' \')}} € | Gamme : {{ row.gamme.name }}</li>
{% endfor %}
{% else %}
<p>Il n\' y a pas de ventes</p>
{% endif %}
<p> </p>
{{asks.signature | raw }}',
                'sort_order' => 2,
                'deleted_at' => null,
                'created_at' => '2021-06-23 10:21:51',
                'updated_at' => '2021-12-23 15:51:51',
                'test_id' => '1',
                'pjs' => null,
                'is_lot' => 1,
                'state' => 'Actif',
                'auto_send' => 1,
                'has_log' => 1,
                'open_log' => 0,
                'click_log' => 0,
                'has_sender' => 0,
                'sender' => '',
                'reply_to' => '',
                'is_embed' => 0
            ]);
        

        $inject_1->rule_asks()->create([
                'code' => 'intro',
                'class_name' => '\\Waka\\Utils\\WakaRules\\Asks\\HtmlAsk',
                'config_data' => [
                    'html' => '<p>Bonjour {{ ds.name }},</p>',
                    'ask_emit' => '1',
                    'ask_text' => '<p>Bonjour {{ ds.name }},</p>'
                ],
                'created_at' => '2021-11-10 16:09:53',
                'updated_at' => '2021-12-23 15:51:51',
                'sort_order' => 36,
                'datas' => null,
                'html' => '<p>Bonjour {{ ds.name }},</p>',
                'ask_emit' => '1',
                'ask_text' => '<p>Bonjour {{ ds.name }},</p>'
            ]);
        $inject_1->rule_asks()->create([
                'code' => 'signature',
                'class_name' => '\\Waka\\Utils\\WakaRules\\Asks\\HtmlAsk',
                'config_data' => [
                    'html' => '<p><strong>Cordialement,</strong>
	<br>{{ ds.commercial.name }}
	<br>{{ ds.commercial.tel }}</p>',
                    'ask_emit' => '1',
                    'ask_text' => '<p><strong>Cordialement,</strong>
	<br>{{ ds.commercial.name }}
	<br>{{ ds.commercial.tel }}</p>'
                ],
                'created_at' => '2021-11-10 16:11:16',
                'updated_at' => '2021-12-23 15:51:51',
                'sort_order' => 37,
                'datas' => null,
                'html' => '<p><strong>Cordialement,</strong>
	<br>{{ ds.commercial.name }}
	<br>{{ ds.commercial.tel }}</p>',
                'ask_emit' => '1',
                'ask_text' => '<p><strong>Cordialement,</strong>
	<br>{{ ds.commercial.name }}
	<br>{{ ds.commercial.tel }}</p>'
            ]);
        $inject_1->rule_fncs()->create([
                'code' => 'ventes',
                'class_name' => 'Wcli\\Crm\\WakaRules\\Fncs\\Ventes',
                'data_source' => null,
                'config_data' => [
                    'title' => 'Vos ventes du mois en cours',
                    'gammes' => '0',
                    'periode' => 'm',
                    'fnc_text' => 'Vos ventes du mois en cours'
                ],
                'created_at' => '2021-11-10 15:41:11',
                'updated_at' => '2021-12-23 15:52:10',
                'sort_order' => 16,
                'datas' => null,
                'title' => 'Vos ventes du mois en cours',
                'gammes' => '0',
                'periode' => 'm',
                'fnc_text' => 'Vos ventes du mois en cours'
            ]);
        $inject_1->save();

        $inject_2 = \Waka\Mailer\Models\WakaMail::create([
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
<p> {{fncs.ventes.title}} </p>
<p>{%for row in fncs.ventes.datas %}  </p>
<ul>
<li>{{ row.name }} | Gamme : {{ row.gamme.name }}<br>
{{row.sale_at | localeDate(\'date-short\')}} | Montant : {{row.amount|number_format(2,\',\',\' \')}} €</li>
</ul>
<p>{%endfor%}</p>
{{ asks.signature | raw }}',
                'sort_order' => 2,
                'deleted_at' => null,
                'created_at' => '2021-08-30 14:25:04',
                'updated_at' => '2021-12-23 15:34:52',
                'test_id' => '1',
                'pjs' => null,
                'is_lot' => 1,
                'state' => 'Actif',
                'auto_send' => 1,
                'has_log' => 1,
                'open_log' => 0,
                'click_log' => 0,
                'has_sender' => 0,
                'sender' => '',
                'reply_to' => '',
                'is_embed' => 0
            ]);
        

        $inject_2->rule_asks()->create([
                'code' => 'titre',
                'class_name' => '\\Waka\\Utils\\WakaRules\\Asks\\LabelAsk',
                'config_data' => [
                    'txt' => 'Bonjour {{ ds.name }}',
                    'ask_emit' => '1',
                    'ask_text' => 'Bonjour {{ ds.name }}'
                ],
                'created_at' => '2021-11-10 15:49:49',
                'updated_at' => '2021-12-23 15:52:51',
                'sort_order' => 29,
                'datas' => null,
                'txt' => 'Bonjour {{ ds.name }}',
                'ask_emit' => '1',
                'ask_text' => 'Bonjour {{ ds.name }}'
            ]);
        $inject_2->rule_asks()->create([
                'code' => 'signature',
                'class_name' => '\\Waka\\Utils\\WakaRules\\Asks\\HtmlAsk',
                'config_data' => [
                    'html' => '<p><strong>Cordialement,</strong>
	<br>{{ ds.commercial.name }}
	<br>{{ ds.commercial.tel }}</p>',
                    'ask_emit' => '1',
                    'ask_text' => '<p><strong>Cordialement,</strong>
	<br>{{ ds.commercial.name }}
	<br>{{ ds.commercial.tel }}</p>'
                ],
                'created_at' => '2021-11-10 15:51:10',
                'updated_at' => '2021-12-23 15:52:51',
                'sort_order' => 32,
                'datas' => null,
                'html' => '<p><strong>Cordialement,</strong>
	<br>{{ ds.commercial.name }}
	<br>{{ ds.commercial.tel }}</p>',
                'ask_emit' => '1',
                'ask_text' => '<p><strong>Cordialement,</strong>
	<br>{{ ds.commercial.name }}
	<br>{{ ds.commercial.tel }}</p>'
            ]);
        $inject_2->rule_fncs()->create([
                'code' => 'ventes',
                'class_name' => 'Wcli\\Crm\\WakaRules\\Fncs\\Ventes',
                'data_source' => null,
                'config_data' => [
                    'title' => 'Voici la liste de vos ventes des 30 derniers jours sur la gamme A',
                    'gammes' => '1,4,5,6',
                    'periode' => 'y',
                    'fnc_text' => 'Voici la liste de vos ventes des 30 derniers jours sur la gamme A'
                ],
                'created_at' => '2021-11-10 15:46:22',
                'updated_at' => '2021-12-23 15:52:51',
                'sort_order' => 17,
                'datas' => null,
                'title' => 'Voici la liste de vos ventes des 30 derniers jours sur la gamme A',
                'gammes' => '1,4,5,6',
                'periode' => 'y',
                'fnc_text' => 'Voici la liste de vos ventes des 30 derniers jours sur la gamme A'
            ]);
        $inject_2->save();

        $inject_3 = \Waka\Mailer\Models\WakaMail::create([
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
<p>{{asks.chart1.title}}</p>
<img src="{{asks.chart1.path}}" alt="Graphique"/>


{% if fncs.ventes.show %}
<p>{{ fncs.ventes.title }}</p>
<ul>
{%for row in fncs.ventes.datas%}
<li>{{ row.name }} | date {{row.sale_at | localeDate(\'date\')}} | montant {{row.amount|number_format(2,\',\',\' \')}} €
{%endfor%}
</ul>
{% else %}
<p>Aucune Vente sur la période</p>
{% endif %}',
                'sort_order' => 5,
                'deleted_at' => null,
                'created_at' => '2021-09-02 14:25:54',
                'updated_at' => '2021-12-23 16:14:55',
                'test_id' => '3',
                'pjs' => null,
                'is_lot' => 1,
                'state' => 'Actif',
                'auto_send' => 1,
                'has_log' => 1,
                'open_log' => 0,
                'click_log' => 0,
                'has_sender' => 0,
                'sender' => '',
                'reply_to' => '',
                'is_embed' => 0
            ]);
        

        $inject_3->rule_asks()->create([
                'code' => 'intro',
                'class_name' => '\\Waka\\Utils\\WakaRules\\Asks\\HtmlAsk',
                'config_data' => [
                    'html' => '<p>Voici un bilan de vos achats.</p>',
                    'ask_emit' => '1',
                    'ask_text' => '<p>Voici un bilan de vos achats.</p>'
                ],
                'created_at' => '2021-11-10 16:20:54',
                'updated_at' => '2021-12-23 16:14:55',
                'sort_order' => 39,
                'datas' => null,
                'html' => '<p>Voici un bilan de vos achats.</p>',
                'ask_emit' => '1',
                'ask_text' => '<p>Voici un bilan de vos achats.</p>'
            ]);
        $inject_3->rule_asks()->create([
                'code' => 'chart1',
                'class_name' => '\\Waka\\Charter\\WakaRules\\Asks\\BarLine',
                'config_data' => [
                    'type' => 'bar',
                    'title' => 'Comparatif CA N et N-1',
                    'width' => '600',
                    'height' => '300',
                    'ask_text' => 'Comparatif CA N et N-1',
                    'relation' => 'client',
                    'src_1_att' => 'y_to_d',
                    'src_2_att' => 'y_1_to_d',
                    'src_labels' => 'getLbVentesByMonth',
                    'src_1_label' => 'CA',
                    'src_2_label' => 'CA (N-1)',
                    'src_calculs' => 'getCcVentesByMonth'
                ],
                'created_at' => '2021-11-10 17:00:19',
                'updated_at' => '2021-12-23 16:14:55',
                'sort_order' => 54,
                'datas' => null,
                'type' => 'bar',
                'title' => 'Comparatif CA N et N-1',
                'width' => '600',
                'height' => '300',
                'ask_text' => 'Comparatif CA N et N-1',
                'relation' => 'client',
                'src_1_att' => 'y_to_d',
                'src_2_att' => 'y_1_to_d',
                'src_labels' => 'getLbVentesByMonth',
                'src_1_label' => 'CA',
                'src_2_label' => 'CA (N-1)',
                'src_calculs' => 'getCcVentesByMonth'
            ]);
        $inject_3->rule_fncs()->create([
                'code' => 'ventes',
                'class_name' => 'Wcli\\Crm\\WakaRules\\Fncs\\Ventes',
                'data_source' => null,
                'config_data' => [
                    'title' => 'Vos dernières commandes :',
                    'periode' => 'd_30',
                    'fnc_text' => 'description des ventes'
                ],
                'created_at' => '2021-11-10 16:19:52',
                'updated_at' => '2021-12-23 16:14:55',
                'sort_order' => 18,
                'datas' => null,
                'title' => 'Vos dernières commandes :',
                'periode' => 'd_30',
                'fnc_text' => 'description des ventes'
            ]);
        $inject_3->save();

        $inject_4 = \Waka\Mailer\Models\WakaMail::create([
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

{%for row in fncs.gammes.datas%}
<div class="w-mt-1">
{{ row.name }}
<div class="w-small">{{ row.description }}</div>
</div>
{%endfor%}',
                'sort_order' => 6,
                'deleted_at' => null,
                'created_at' => '2021-09-02 14:27:50',
                'updated_at' => '2021-12-23 16:13:11',
                'test_id' => '2',
                'pjs' => null,
                'is_lot' => 1,
                'state' => 'Actif',
                'auto_send' => 1,
                'has_log' => 1,
                'open_log' => 0,
                'click_log' => 0,
                'has_sender' => 0,
                'sender' => '',
                'reply_to' => '',
                'is_embed' => 0
            ]);
        

        $inject_4->rule_fncs()->create([
                'code' => 'gammes',
                'class_name' => 'Wcli\\Crm\\WakaRules\\Fncs\\Gammes',
                'data_source' => null,
                'config_data' => [
                    'title' => '',
                    'gammes' => '1,4,5,6,2,7,8',
                    'fnc_text' => 'description des gammes'
                ],
                'created_at' => '2021-11-10 17:24:44',
                'updated_at' => '2021-12-23 16:13:11',
                'sort_order' => 19,
                'datas' => null,
                'title' => '',
                'gammes' => '1,4,5,6,2,7,8',
                'fnc_text' => 'description des gammes'
            ]);
        $inject_4->save();

 
    }

}
