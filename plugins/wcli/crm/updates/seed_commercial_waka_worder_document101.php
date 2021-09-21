<?php namespace Wcli\Crm\Models;

use Seeder;



class SeedCommercialWakaWorderDocument101 extends Seeder
{
    public function run()
    {
        \Waka\Worder\Models\Document::where('data_source', 'commercial')->delete();;
            
        $inject = \Waka\Worder\Models\Document::create([
                'name' => 'Bilan CA avec graphique et aggrégation',
                'slug' => 'bilan-ca-avec-graphique-et-aggregation',
                'path' => '/word/bilan_commerciaux.docx',
                'data_source' => 'commercial',
                'model_functions' => [
                    [
                        'name' => 'Tous les ventes de ses clients',
                        'collectionCode' => 'ventes',
                        'periode' => 'y',
                        'functionCode' => 'ventes'
                    ],
                    [
                        'name' => 'Graphique comparatif',
                        'collectionCode' => 'comparatif',
                        'width' => '600',
                        'height' => '500',
                        'chartType' => 'bar',
                        'periode' => 'y_to_d',
                        'periode2' => 'y_1_to_d',
                        'beginAtZero' => '1',
                        'color' => 'primary',
                        'functionCode' => 'chart1'
                    ],
                    [
                        'name' => 'Les ventes de vos clients',
                        'collectionCode' => 'aggs',
                        'column' => '',
                        'calcul' => '=',
                        'valeur' => '',
                        'functionCode' => 'clientsVentes'
                    ]
                ],
                'images' => null,
                'scopes' => null,
                'sort_order' => 4,
                'deleted_at' => null,
                'created_at' => '2021-09-02 14:44:01',
                'updated_at' => '2021-09-07 14:06:23',
                'is_scope' => 0,
                'name_construction' => '{{ds.name}} Votre bilan',
                'test_id' => '2',
                'has_asks' => 0,
                'asks' => [],
                'is_lot' => 1
            ]);
        $optionalPath = "/word";
        $localDisk = new \Waka\Utils\Classes\WorkDirFiles();
        $file = plugins_path('wcli/crm/updates/files/bilan_commerciaux.docx');
        $localDisk->putFile($file, $optionalPath);
            //
 
 
    }

}
