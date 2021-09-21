<?php namespace Wcli\Crm\Models;

use Seeder;



class SeedContactWakaWorderDocument101 extends Seeder
{
    public function run()
    {
        \Waka\Worder\Models\Document::where('data_source', 'contact')->delete();;
            
        $inject = \Waka\Worder\Models\Document::create([
                'name' => 'Liste des gammes',
                'slug' => 'wcli.crm::gammes',
                'path' => '/word/presentation_gammes_contact.docx',
                'data_source' => 'contact',
                'model_functions' => [
                    [
                        'name' => 'Présentation des gammes',
                        'collectionCode' => 'gammes',
                        'functionCode' => 'gammes'
                    ]
                ],
                'images' => null,
                'scopes' => null,
                'sort_order' => 1,
                'deleted_at' => null,
                'created_at' => '2021-08-31 14:40:24',
                'updated_at' => '2021-09-07 13:53:21',
                'is_scope' => 0,
                'name_construction' => 'Présentation des gammes',
                'test_id' => '1',
                'has_asks' => 1,
                'asks' => [
                    [
                        'code' => 'intro',
                        'is_asked' => '1',
                        'content' => '<p>Veuillez trouver la liste de nos gammes</p>
',
                        '_group' => 'richeditor'
                    ]
                ],
                'is_lot' => 1
            ]);
        $optionalPath = "/word";
        $localDisk = new \Waka\Utils\Classes\WorkDirFiles();
        $file = plugins_path('wcli/crm/updates/files/presentation_gammes_contact.docx');
        $localDisk->putFile($file, $optionalPath);
            //
 
        $inject = \Waka\Worder\Models\Document::create([
                'name' => 'Bilan ( contact )',
                'slug' => 'bilan-contact',
                'path' => '/word/bilan_contact.docx',
                'data_source' => 'contact',
                'model_functions' => [
                    [
                        'name' => 'Graphique comparatif',
                        'collectionCode' => 'comparatif',
                        'width' => '600',
                        'height' => '300',
                        'chartType' => 'bar',
                        'periode' => 'y_to_d',
                        'periode2' => 'y_1_to_d',
                        'beginAtZero' => '1',
                        'color' => 'primary',
                        'functionCode' => 'chart1'
                    ],
                    [
                        'name' => 'Tous les ventes du client',
                        'collectionCode' => 'ventes',
                        'periode' => 'd_365',
                        'functionCode' => 'ventes'
                    ]
                ],
                'images' => null,
                'scopes' => null,
                'sort_order' => 6,
                'deleted_at' => null,
                'created_at' => '2021-09-07 14:10:32',
                'updated_at' => '2021-09-07 14:24:49',
                'is_scope' => 0,
                'name_construction' => 'Bilan {{ ds.client.name }} pour {{ ds.name }}',
                'test_id' => '2',
                'has_asks' => 1,
                'asks' => [
                    [
                        'code' => 'intro',
                        'is_asked' => '1',
                        'content' => '<p>Veuillez trouver votre bilan annuel avec un comparatif de vos achats 2020 - 2021 et l\'ensemble de vos ventes jusqu\'à ce jour.&nbsp;</p>
',
                        '_group' => 'richeditor'
                    ]
                ],
                'is_lot' => 1
            ]);
        $optionalPath = "/word";
        $localDisk = new \Waka\Utils\Classes\WorkDirFiles();
        $file = plugins_path('wcli/crm/updates/files/bilan_contact.docx');
        $localDisk->putFile($file, $optionalPath);
            //
 
 
    }

}
