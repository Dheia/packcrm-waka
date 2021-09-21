<?php namespace Wcli\Crm\Models;

use Seeder;



class SeedProduit extends Seeder
{
    public function run()
    {
        \Wcli\Crm\Models\Produit::truncate();
            
        $inject = \Wcli\Crm\Models\Produit::create([
                'name' => 'Diagnostique de faisabilité',
                'gamme_id' => 4,
                'code' => '',
                'description' => '',
                'cu' => 1200.0,
                'qty' => 1,
                'tva' => 1.2,
                'total_ht' => 1200.0,
                'sort_order' => 1,
                'created_at' => '2021-09-22 13:55:10',
                'updated_at' => '2021-09-22 13:55:52'
            ]);
        // $inject->image = plugins_path('wcli/crm');
        // $inject->save();

 
        $inject = \Wcli\Crm\Models\Produit::create([
                'name' => 'Etude préalable',
                'gamme_id' => 5,
                'code' => '',
                'description' => '',
                'cu' => 1200.0,
                'qty' => 1,
                'tva' => 1.2,
                'total_ht' => 1200.0,
                'sort_order' => 2,
                'created_at' => '2021-09-22 13:54:19',
                'updated_at' => '2021-09-22 13:55:52'
            ]);
        // $inject->image = plugins_path('wcli/crm');
        // $inject->save();

 
        $inject = \Wcli\Crm\Models\Produit::create([
                'name' => 'Cage sur mesure',
                'gamme_id' => 8,
                'code' => '',
                'description' => 'Description cage sur mesure',
                'cu' => 2500.0,
                'qty' => 1,
                'tva' => 1.2,
                'total_ht' => 2500.0,
                'sort_order' => 3,
                'created_at' => '2021-09-22 12:23:12',
                'updated_at' => '2021-09-22 13:55:52'
            ]);
        // $inject->image = plugins_path('wcli/crm');
        // $inject->save();

 
        $inject = \Wcli\Crm\Models\Produit::create([
                'name' => 'Panier',
                'gamme_id' => 6,
                'code' => '',
                'description' => 'Description du panier',
                'cu' => 250.0,
                'qty' => 1,
                'tva' => 1.2,
                'total_ht' => 250.0,
                'sort_order' => 4,
                'created_at' => '2021-09-22 13:52:21',
                'updated_at' => '2021-09-22 13:55:52'
            ]);
        // $inject->image = plugins_path('wcli/crm');
        // $inject->save();

 
        $inject = \Wcli\Crm\Models\Produit::create([
                'name' => 'Filet cage',
                'gamme_id' => 7,
                'code' => '',
                'description' => 'Filet cage, grande taille',
                'cu' => 80.0,
                'qty' => 1,
                'tva' => 1.2,
                'total_ht' => 80.0,
                'sort_order' => 5,
                'created_at' => '2021-09-22 13:52:59',
                'updated_at' => '2021-09-22 13:55:52'
            ]);
        // $inject->image = plugins_path('wcli/crm');
        // $inject->save();

 
        $inject = \Wcli\Crm\Models\Produit::create([
                'name' => 'Filet cage Moyen',
                'gamme_id' => 7,
                'code' => '',
                'description' => '',
                'cu' => 150.0,
                'qty' => 1,
                'tva' => 1.2,
                'total_ht' => 70.0,
                'sort_order' => 6,
                'created_at' => '2021-09-22 13:53:28',
                'updated_at' => '2021-09-22 13:55:52'
            ]);
        // $inject->image = plugins_path('wcli/crm');
        // $inject->save();

 
        $inject = \Wcli\Crm\Models\Produit::create([
                'name' => 'Pose & installation',
                'gamme_id' => 9,
                'code' => '',
                'description' => '',
                'cu' => 800.0,
                'qty' => 2,
                'tva' => 1.1,
                'total_ht' => 1600.0,
                'sort_order' => 7,
                'created_at' => '2021-09-22 13:55:39',
                'updated_at' => '2021-09-22 13:56:12'
            ]);
        // $inject->image = plugins_path('wcli/crm');
        // $inject->save();

 
 
    }

}
