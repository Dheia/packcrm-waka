<?php namespace Wcli\Crm\Models;

use Seeder;



class SeedContactWakaWorderDocument extends Seeder
{
    public function run()
    {
        $toDeletes = \Waka\Worder\Models\Document::where('data_source', 'contact')->get();
        foreach($toDeletes as $delete) {
                $delete->forceDelete();
        }
            
        $inject_0 = \Waka\Worder\Models\Document::create([
                'name' => 'Liste des gammes',
                'slug' => 'wcli.crm::gammes',
                'path' => '/word/presentation_gammes_contact.docx',
                'data_source' => 'contact',
                'sort_order' => 1,
                'deleted_at' => null,
                'created_at' => '2021-08-31 14:40:24',
                'updated_at' => '2021-11-11 10:33:01',
                'name_construction' => 'Présentation des gammes',
                'test_id' => '1',
                'is_lot' => 1,
                'state' => 'Actif'
            ]);
        
            $optionalPath = "/word";
            $localDisk = new \Waka\Utils\Classes\WorkDirFiles();
            $file = plugins_path('wcli/crm/updates/seeds/files/presentation_gammes_contact.docx');
            $localDisk->putFile($file, $optionalPath);
                //

        $inject_0->rule_asks()->create([
                'code' => 'intro',
                'class_name' => '\\Waka\\Utils\\WakaRules\\Asks\\HtmlAsk',
                'config_data' => [
                    'html' => '<p>Introduction du document</p>',
                    'ask_emit' => '1',
                    'ask_text' => 'Ajoute un champs HTML'
                ],
                'created_at' => '2021-12-23 16:20:39',
                'updated_at' => '2021-12-23 17:21:31',
                'sort_order' => 60,
                'datas' => null,
                'html' => '<p>Introduction du document</p>',
                'ask_emit' => '1',
                'ask_text' => 'Ajoute un champs HTML'
            ]);
        $inject_0->rule_fncs()->create([
                'code' => 'gammes',
                'class_name' => 'Wcli\\Crm\\WakaRules\\Fncs\\Gammes',
                'data_source' => null,
                'config_data' => [
                    'title' => 'Description de nos gammes',
                    'fnc_text' => 'Description de nos gammes'
                ],
                'created_at' => '2021-11-11 10:02:24',
                'updated_at' => '2021-12-23 17:21:31',
                'sort_order' => 24,
                'datas' => null,
                'title' => 'Description de nos gammes',
                'fnc_text' => 'Description de nos gammes'
            ]);
        $inject_0->save();

        $inject_1 = \Waka\Worder\Models\Document::create([
                'name' => 'Bilan ( contact )',
                'slug' => 'bilan-contact',
                'path' => '/word/bilan_contact.docx',
                'data_source' => 'contact',
                'sort_order' => 6,
                'deleted_at' => null,
                'created_at' => '2021-09-07 14:10:32',
                'updated_at' => '2021-09-07 14:24:49',
                'name_construction' => 'Bilan {{ ds.client.name }} pour {{ ds.name }}',
                'test_id' => '2',
                'is_lot' => 1,
                'state' => 'Actif'
            ]);
        
            $optionalPath = "/word";
            $localDisk = new \Waka\Utils\Classes\WorkDirFiles();
            $file = plugins_path('wcli/crm/updates/seeds/files/bilan_contact.docx');
            $localDisk->putFile($file, $optionalPath);
                //

        $inject_1->rule_asks()->create([
                'code' => 'chart1',
                'class_name' => '\\Waka\\Charter\\WakaRules\\Asks\\BarLine',
                'config_data' => [
                    'type' => 'bar',
                    'title' => '',
                    'width' => '600',
                    'height' => '400',
                    'ask_text' => 'Accèpte multiples dataSet',
                    'relation' => 'client',
                    'src_1_att' => 'y',
                    'src_2_att' => 'y_1',
                    'src_labels' => 'getLbVentesByMonth',
                    'src_1_label' => 'CA',
                    'src_2_label' => 'CA N-1',
                    'src_calculs' => 'getCcVentesByMonth'
                ],
                'created_at' => '2021-12-23 17:22:44',
                'updated_at' => '2021-12-23 17:29:17',
                'sort_order' => 62,
                'datas' => null,
                'type' => 'bar',
                'title' => '',
                'width' => '600',
                'height' => '400',
                'ask_text' => 'Accèpte multiples dataSet',
                'relation' => 'client',
                'src_1_att' => 'y',
                'src_2_att' => 'y_1',
                'src_labels' => 'getLbVentesByMonth',
                'src_1_label' => 'CA',
                'src_2_label' => 'CA N-1',
                'src_calculs' => 'getCcVentesByMonth'
            ]);
        $inject_1->rule_asks()->create([
                'code' => 'intro',
                'class_name' => '\\Waka\\Utils\\WakaRules\\Asks\\HtmlAsk',
                'config_data' => [
                    'html' => '<p>Vous trouverez le bilan des achats effectué par votre société : <strong>{{ ds.client.name }}, </strong>depuis le debut de notre collaboration. </p>',
                    'ask_emit' => '0',
                    'ask_text' => '<p>Vous trouverez le bilan des achats effectué par votre société : <strong>{{ ds.client.name }}</strong></p>'
                ],
                'created_at' => '2021-12-23 17:25:00',
                'updated_at' => '2021-12-23 17:29:17',
                'sort_order' => 63,
                'datas' => null,
                'html' => '<p>Vous trouverez le bilan des achats effectué par votre société : <strong>{{ ds.client.name }}, </strong>depuis le debut de notre collaboration. </p>',
                'ask_emit' => '0',
                'ask_text' => '<p>Vous trouverez le bilan des achats effectué par votre société : <strong>{{ ds.client.name }}</strong></p>'
            ]);
        $inject_1->rule_fncs()->create([
                'code' => 'ventes',
                'class_name' => 'Wcli\\Crm\\WakaRules\\Fncs\\Ventes',
                'data_source' => null,
                'config_data' => [
                    'title' => '',
                    'periode' => 'all',
                    'fnc_text' => 'description des ventes'
                ],
                'created_at' => '2021-12-23 17:24:13',
                'updated_at' => '2021-12-23 17:29:17',
                'sort_order' => 29,
                'datas' => null,
                'title' => '',
                'periode' => 'all',
                'fnc_text' => 'description des ventes'
            ]);
        $inject_1->save();

 
    }

}
