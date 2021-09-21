<?php namespace Wcli\Crm\Models;

use Seeder;



class SeedClientWakaImportExportExport101 extends Seeder
{
    public function run()
    {
        \Waka\ImportExport\Models\Export::where('data_source', 'client')->delete();;
            
        $inject = \Waka\ImportExport\Models\Export::create([
                'name' => 'Export de client',
                'data_source' => 'client',
                'is_editable' => 0,
                'export_model_class' => 'Wcli\\Crm\\Classes\\Exports\\ClientsExport',
                'for_relation' => null,
                'relation' => null,
                'column_list' => null,
                'comment' => 'Export de base',
                'is_scope' => null,
                'scopes' => null,
                'use_batch' => null,
                'created_at' => '2021-08-23 06:38:35',
                'updated_at' => '2021-08-23 06:38:35'
            ]);
        $inject = \Waka\ImportExport\Models\Export::create([
                'name' => 'Export des ventes de client',
                'data_source' => 'client',
                'is_editable' => 0,
                'export_model_class' => 'Wcli\\Crm\\Classes\\Exports\\ClientsExportVentes',
                'for_relation' => null,
                'relation' => 'ventes',
                'column_list' => null,
                'comment' => 'Export de base',
                'is_scope' => null,
                'scopes' => null,
                'use_batch' => null,
                'created_at' => '2021-08-23 07:43:55',
                'updated_at' => '2021-08-23 07:43:55'
            ]);
 
    }

}
