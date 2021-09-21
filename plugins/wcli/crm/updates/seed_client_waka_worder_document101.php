<?php namespace Wcli\Crm\Models;

use Seeder;



class SeedClientWakaWorderDocument101 extends Seeder
{
    public function run()
    {
        \Waka\Worder\Models\Document::where('data_source', 'client')->delete();;
            
        $inject = \Waka\Worder\Models\Document::create([
                'name' => 'Bilan achats du client  avec graphique et aggrégation',
                'slug' => 'bilan-achats-du-client-avec-graphique-et-aggregation',
                'path' => '/word/bilan_client.docx',
                'data_source' => 'client',
                'model_functions' => [
                    1 => [
                        'name' => 'Graphique comparatif de CA',
                        'collectionCode' => 'comparatif',
                        'width' => '600',
                        'height' => '250',
                        'chartType' => 'bar',
                        'periode' => 'y_to_d',
                        'periode2' => 'y_1_to_d',
                        'beginAtZero' => '0',
                        'color' => 'secondary',
                        'functionCode' => 'chart1'
                    ],
                    2 => [
                        'name' => 'Liste des Ventes',
                        'collectionCode' => 'ventes',
                        'periode' => 'all',
                        'functionCode' => 'ventes'
                    ]
                ],
                'images' => null,
                'scopes' => null,
                'sort_order' => 3,
                'deleted_at' => null,
                'created_at' => '2021-09-02 14:35:26',
                'updated_at' => '2021-09-20 14:37:34',
                'is_scope' => 0,
                'name_construction' => '{{ ds.name }} : bilan de vos achats',
                'test_id' => '2',
                'has_asks' => 1,
                'asks' => [
                    [
                        'code' => 'intro',
                        'is_asked' => '1',
                        'content' => '<p>Veuillez trouver le bilan de vos achats de cette année.&nbsp;</p>
',
                        '_group' => 'richeditor'
                    ]
                ],
                'is_lot' => 1
            ]);
        $optionalPath = "/word";
        $localDisk = new \Waka\Utils\Classes\WorkDirFiles();
        $file = plugins_path('wcli/crm/updates/files/bilan_client.docx');
        $localDisk->putFile($file, $optionalPath);
            //
 
 
    }

}
