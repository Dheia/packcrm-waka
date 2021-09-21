<?php namespace Wcli\Crm\Models;

use Seeder;



class SeedContactWakaImportExportExport101 extends Seeder
{
    public function run()
    {
        \Waka\ImportExport\Models\Export::where('data_source', 'contact')->delete();;
            
        $inject = \Waka\ImportExport\Models\Export::create([
                'name' => 'Export de contact',
                'data_source' => 'contact',
                'is_editable' => 0,
                'export_model_class' => 'Wcli\\Crm\\Classes\\Exports\\ContactsExport',
                'for_relation' => null,
                'relation' => null,
                'column_list' => null,
                'comment' => 'Export de base',
                'is_scope' => null,
                'scopes' => null,
                'use_batch' => null,
                'created_at' => '2021-08-23 07:01:50',
                'updated_at' => '2021-08-23 07:01:50'
            ]);
 
    }

}
