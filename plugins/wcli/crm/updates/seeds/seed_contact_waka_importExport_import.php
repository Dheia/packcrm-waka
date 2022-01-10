<?php namespace Wcli\Crm\Models;

use Seeder;



class SeedContactWakaImportExportImport extends Seeder
{
    public function run()
    {
        $toDeletes = \Waka\ImportExport\Models\Import::where('data_source', 'contact')->get();
        foreach($toDeletes as $delete) {
                $delete->forceDelete();
        }
            
 
    }

}
