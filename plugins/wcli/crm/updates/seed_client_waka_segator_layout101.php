<?php namespace Wcli\Crm\Models;

use Seeder;



class SeedClientWakaSegatorLayout101 extends Seeder
{
    public function run()
    {
        \Waka\Segator\Models\Tag::truncate();
            
        $inject = \Waka\Segator\Models\Tag::create([
                'name' => 'Acheteur Gamme A',
                'slug' => 'acheteur_gamme_a',
                'is_active' => 1,
                'is_hidden' => 0,
                'data_source' => 'client',
                'is_manual' => 0,
                'is_auto_class_calculs' => 1,
                'class_calculs' => '',
                'parent_incs' => null,
                'parent_excs' => null,
                'calculs' => [
                    [
                        'name' => 'Tague si NB ventes supérieures à 5 sur la gamme A',
                        'nb' => '80',
                        'gammes' => [
                            '4',
                            '5',
                            '6'
                        ],
                        'periode' => 'y',
                        'calculCode' => 'nbVentesGammes',
                        'tagId' => '612cfc1723a87'
                    ]
                ],
                'sort_order' => 1,
                'created_at' => '2021-08-30 15:29:08',
                'updated_at' => '2021-08-30 16:15:10'
            ]);
        $inject = \Waka\Segator\Models\Tag::create([
                'name' => 'Client important',
                'slug' => 'client-important',
                'is_active' => 1,
                'is_hidden' => 0,
                'data_source' => 'client',
                'is_manual' => 0,
                'is_auto_class_calculs' => 1,
                'class_calculs' => '',
                'parent_incs' => null,
                'parent_excs' => null,
                'calculs' => [
                    [
                        'name' => 'Tague si NB ventes supérieures à XX sur les gammes ',
                        'nb' => '200',
                        'periode' => 'all',
                        'calculCode' => 'nbVentesGammes',
                        'tagId' => '612d055df04ff'
                    ]
                ],
                'sort_order' => 3,
                'created_at' => '2021-08-30 16:20:28',
                'updated_at' => '2021-08-30 16:21:38'
            ]);
 
    }

}
