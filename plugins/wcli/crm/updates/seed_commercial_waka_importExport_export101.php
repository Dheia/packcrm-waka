<?php namespace Wcli\Crm\Models;

use Seeder;



class SeedCommercialWakaImportExportExport101 extends Seeder
{
    public function run()
    {
        \Waka\ImportExport\Models\Export::where('data_source', 'commercial')->delete();;
            
        $inject = \Waka\ImportExport\Models\Export::create([
                'name' => 'Export de commercial',
                'data_source' => 'commercial',
                'is_editable' => 0,
                'export_model_class' => 'Wcli\\Crm\\Classes\\Exports\\CommercialsExport',
                'for_relation' => null,
                'relation' => null,
                'column_list' => null,
                'comment' => 'Export de base',
                'is_scope' => null,
                'scopes' => null,
                'use_batch' => null,
                'created_at' => '2021-08-23 06:59:20',
                'updated_at' => '2021-08-23 06:59:20'
            ]);
 
    }

}
