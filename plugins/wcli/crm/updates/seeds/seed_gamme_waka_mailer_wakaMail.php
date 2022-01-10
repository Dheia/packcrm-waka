<?php namespace Wcli\Crm\Models;

use Seeder;



class SeedGammeWakaMailerWakaMail extends Seeder
{
    public function run()
    {
        $toDeletes = \Waka\Mailer\Models\WakaMail::where('data_source', 'gamme')->get();
        foreach($toDeletes as $delete) {
                $delete->forceDelete();
        }
            
 
    }

}
