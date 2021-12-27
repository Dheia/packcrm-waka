<?php namespace Wcli\Crm\Models;

use Seeder;



class SeedContactWakaMailerBloc101 extends Seeder
{
    public function run()
    {
        \Waka\Mailer\Models\Bloc::truncate();
            
        $inject = \Waka\Mailer\Models\Bloc::create([
                'name' => 'base footer',
                'slug' => 'base_footer',
                'contenu' => '<table class="w-bg-gl w-w-full w-pa-4 w-mt-4" align="center" cellpadding="0" cellspacing="0">
    <tr class="w-w-full">
        <td  align="center">
            <img  src="{{ \'themes/wakatailwind/assets/images/logo.png\' |app }}" alt="logo" style="height:auto;width:150px" />

        </td>
        <td class="" align="center">
            <p class="w-small">CLIENT tout droit réservé. ADRESSE - VILLE - CP.</p>
            <p class="w-smaller">vos données personnelles ne seront en aucun
                cas communiquées à des tiers.</p>

        </td>
    </tr>
</table>
<div style="height:10px" class="w-w-full w-bg-p"></div>',
                'description' => 'Footer pour le template de base',
                'sort_order' => 1,
                'created_at' => '2021-06-23 10:21:51',
                'updated_at' => '2021-07-04 09:35:50'
            ]);
        $inject = \Waka\Mailer\Models\Bloc::create([
                'name' => 'testr',
                'slug' => 'terdssd',
                'contenu' => null,
                'description' => 'sdsdsdsd',
                'sort_order' => 2,
                'created_at' => '2021-09-08 14:15:03',
                'updated_at' => '2021-09-08 14:15:03'
            ]);
 
    }

}
