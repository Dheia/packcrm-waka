<?php namespace Wcli\Crm\Models;

use Seeder;



class SeedContactWakaImportExportExport extends Seeder
{
    public function run()
    {
        $toDeletes = \Waka\ImportExport\Models\Export::where('data_source', 'contact')->get();
        foreach($toDeletes as $delete) {
                $delete->forceDelete();
        }
            
 
    }

}
