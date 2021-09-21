<?php namespace Wcli\Crm\Models;

use Seeder;



class SeedGamme101 extends Seeder
{
    public function run()
    {
        \Wcli\Crm\Models\Gamme::truncate();
            
        $inject = \Wcli\Crm\Models\Gamme::create([
                'name' => 'Gamme A',
                'slug' => 'gamme-a',
                'description' => 'Description de Gamme A',
                'couleur' => null,
                'parent_id' => null,
                'nest_left' => 1,
                'nest_right' => 8,
                'nest_depth' => 0,
                'created_at' => '2021-09-07 14:20:39',
                'updated_at' => '2021-09-20 13:23:07'
            ]);
        $inject->image = plugins_path('wcli/crm/updates/files/g_a-8.png');
        $inject->save();

 
        $inject = \Wcli\Crm\Models\Gamme::create([
                'name' => 'A1',
                'slug' => 'a1',
                'description' => 'Description de A1',
                'couleur' => null,
                'parent_id' => 1,
                'nest_left' => 2,
                'nest_right' => 3,
                'nest_depth' => 1,
                'created_at' => '2021-09-07 14:20:39',
                'updated_at' => '2021-09-20 13:23:07'
            ]);
        $inject->image = plugins_path('wcli/crm/updates/files/g_a_1-8.png');
        $inject->save();

 
        $inject = \Wcli\Crm\Models\Gamme::create([
                'name' => 'A2',
                'slug' => 'a2',
                'description' => 'Description de A2',
                'couleur' => null,
                'parent_id' => 1,
                'nest_left' => 4,
                'nest_right' => 5,
                'nest_depth' => 1,
                'created_at' => '2021-09-07 14:20:39',
                'updated_at' => '2021-09-20 13:23:07'
            ]);
        $inject->image = plugins_path('wcli/crm/updates/files/g_a_2-8.png');
        $inject->save();

 
        $inject = \Wcli\Crm\Models\Gamme::create([
                'name' => 'A3',
                'slug' => 'a3',
                'description' => 'Description de A3',
                'couleur' => null,
                'parent_id' => 1,
                'nest_left' => 6,
                'nest_right' => 7,
                'nest_depth' => 1,
                'created_at' => '2021-09-07 14:20:39',
                'updated_at' => '2021-09-20 13:23:07'
            ]);
        $inject->image = plugins_path('wcli/crm/updates/files/g_a_3-8.png');
        $inject->save();

 
        $inject = \Wcli\Crm\Models\Gamme::create([
                'name' => 'Gamme B',
                'slug' => 'gamme-b',
                'description' => 'Description de Gamme B',
                'couleur' => null,
                'parent_id' => null,
                'nest_left' => 9,
                'nest_right' => 14,
                'nest_depth' => 0,
                'created_at' => '2021-09-07 14:20:39',
                'updated_at' => '2021-09-20 13:23:07'
            ]);
        $inject->image = plugins_path('wcli/crm/updates/files/g_b-8.png');
        $inject->save();

 
        $inject = \Wcli\Crm\Models\Gamme::create([
                'name' => 'B1',
                'slug' => 'b1',
                'description' => 'Description de B1',
                'couleur' => null,
                'parent_id' => 8,
                'nest_left' => 10,
                'nest_right' => 11,
                'nest_depth' => 1,
                'created_at' => '2021-09-07 14:20:39',
                'updated_at' => '2021-09-20 13:23:07'
            ]);
        $inject->image = plugins_path('wcli/crm/updates/files/g_b_1-8.png');
        $inject->save();

 
        $inject = \Wcli\Crm\Models\Gamme::create([
                'name' => 'B2',
                'slug' => 'b2',
                'description' => 'Description de B2',
                'couleur' => null,
                'parent_id' => 8,
                'nest_left' => 12,
                'nest_right' => 13,
                'nest_depth' => 1,
                'created_at' => '2021-09-07 14:20:39',
                'updated_at' => '2021-09-20 13:23:07'
            ]);
        $inject->image = plugins_path('wcli/crm/updates/files/g_b_2-8.png');
        $inject->save();

 
        $inject = \Wcli\Crm\Models\Gamme::create([
                'name' => 'Gamme C',
                'slug' => 'gamme-c',
                'description' => 'Description de Gamme C',
                'couleur' => null,
                'parent_id' => null,
                'nest_left' => 15,
                'nest_right' => 18,
                'nest_depth' => 0,
                'created_at' => '2021-09-07 14:20:39',
                'updated_at' => '2021-09-20 13:22:59'
            ]);
        $inject->image = plugins_path('wcli/crm/updates/files/g_c-8.png');
        $inject->save();

 
        $inject = \Wcli\Crm\Models\Gamme::create([
                'name' => 'C1',
                'slug' => 'c1',
                'description' => 'Description de C1',
                'couleur' => null,
                'parent_id' => 9,
                'nest_left' => 16,
                'nest_right' => 17,
                'nest_depth' => 1,
                'created_at' => '2021-09-07 14:20:39',
                'updated_at' => '2021-09-20 13:22:59'
            ]);
        $inject->image = plugins_path('wcli/crm/updates/files/g_c_1-8.png');
        $inject->save();

 
 
    }

}
