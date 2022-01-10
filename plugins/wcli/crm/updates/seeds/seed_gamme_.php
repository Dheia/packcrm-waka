<?php namespace Wcli\Crm\Models;

use Seeder;



class SeedGamme extends Seeder
{
    public function run()
    {
        \Wcli\Crm\Models\Gamme::truncate();
            
        $inject_0 = \Wcli\Crm\Models\Gamme::create([
                'name' => 'Gamme A',
                'slug' => 'gamme-a',
                'description' => 'Description de Gamme A',
                'couleur' => null,
                'parent_id' => null,
                'nest_left' => 1,
                'nest_right' => 8,
                'nest_depth' => 0,
                'created_at' => '2021-12-23 15:44:27',
                'updated_at' => '2021-12-23 15:44:27'
            ]);
        

        $inject_0->save();

        $inject_1 = \Wcli\Crm\Models\Gamme::create([
                'name' => 'A1',
                'slug' => 'a1',
                'description' => 'Description de A1',
                'couleur' => null,
                'parent_id' => 1,
                'nest_left' => 2,
                'nest_right' => 3,
                'nest_depth' => 1,
                'created_at' => '2021-12-23 15:44:27',
                'updated_at' => '2021-12-23 15:44:27'
            ]);
        

        $inject_1->save();

        $inject_2 = \Wcli\Crm\Models\Gamme::create([
                'name' => 'A2',
                'slug' => 'a2',
                'description' => 'Description de A2',
                'couleur' => null,
                'parent_id' => 1,
                'nest_left' => 4,
                'nest_right' => 5,
                'nest_depth' => 1,
                'created_at' => '2021-12-23 15:44:27',
                'updated_at' => '2021-12-23 15:44:27'
            ]);
        

        $inject_2->save();

        $inject_3 = \Wcli\Crm\Models\Gamme::create([
                'name' => 'A3',
                'slug' => 'a3',
                'description' => 'Description de A3',
                'couleur' => null,
                'parent_id' => 1,
                'nest_left' => 6,
                'nest_right' => 7,
                'nest_depth' => 1,
                'created_at' => '2021-12-23 15:44:27',
                'updated_at' => '2021-12-23 15:44:27'
            ]);
        

        $inject_3->save();

        $inject_4 = \Wcli\Crm\Models\Gamme::create([
                'name' => 'Gamme B',
                'slug' => 'gamme-b',
                'description' => 'Description de Gamme B',
                'couleur' => null,
                'parent_id' => null,
                'nest_left' => 9,
                'nest_right' => 14,
                'nest_depth' => 0,
                'created_at' => '2021-12-23 15:44:27',
                'updated_at' => '2021-12-23 15:44:27'
            ]);
        

        $inject_4->save();

        $inject_5 = \Wcli\Crm\Models\Gamme::create([
                'name' => 'B1',
                'slug' => 'b1',
                'description' => 'Description de B1',
                'couleur' => null,
                'parent_id' => 2,
                'nest_left' => 10,
                'nest_right' => 11,
                'nest_depth' => 1,
                'created_at' => '2021-12-23 15:44:27',
                'updated_at' => '2021-12-23 15:44:27'
            ]);
        

        $inject_5->save();

        $inject_6 = \Wcli\Crm\Models\Gamme::create([
                'name' => 'B2',
                'slug' => 'b2',
                'description' => 'Description de B2',
                'couleur' => null,
                'parent_id' => 2,
                'nest_left' => 12,
                'nest_right' => 13,
                'nest_depth' => 1,
                'created_at' => '2021-12-23 15:44:27',
                'updated_at' => '2021-12-23 15:44:27'
            ]);
        

        $inject_6->save();

        $inject_7 = \Wcli\Crm\Models\Gamme::create([
                'name' => 'Gamme C',
                'slug' => 'gamme-c',
                'description' => 'Description de Gamme C',
                'couleur' => null,
                'parent_id' => null,
                'nest_left' => 15,
                'nest_right' => 18,
                'nest_depth' => 0,
                'created_at' => '2021-12-23 15:44:27',
                'updated_at' => '2021-12-23 15:44:27'
            ]);
        

        $inject_7->save();

        $inject_8 = \Wcli\Crm\Models\Gamme::create([
                'name' => 'C1',
                'slug' => 'c1',
                'description' => 'Description de C1',
                'couleur' => null,
                'parent_id' => 3,
                'nest_left' => 16,
                'nest_right' => 17,
                'nest_depth' => 1,
                'created_at' => '2021-12-23 15:44:27',
                'updated_at' => '2021-12-23 15:44:27'
            ]);
        

        $inject_8->save();

 
    }

}
