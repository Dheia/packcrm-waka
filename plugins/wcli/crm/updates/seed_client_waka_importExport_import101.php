<?php namespace Wcli\Crm\Models;

use Seeder;



class SeedClientWakaImportExportImport101 extends Seeder
{
    public function run()
    {
        \Waka\ImportExport\Models\Import::where('data_source', 'client')->delete();;
            
        $inject = \Waka\ImportExport\Models\Import::create([
                'name' => 'Import de client',
                'data_source' => 'client',
                'is_editable' => 0,
                'import_model_class' => 'Wcli\\Crm\\Classes\\Imports\\ClientsImport',
                'for_relation' => 0,
                'relation' => '',
                'column_list' => '',
                'comment' => 'Import de base si le champs ID est vide, l\'application créera une nouvelle ligne sinon elle tentera une MAJ de la ligne',
                'is_scope' => 0,
                'scopes' => null,
                'use_batch' => 0,
                'created_at' => '2021-06-21 09:41:22',
                'updated_at' => '2021-06-21 09:45:44'
            ]);
        $inject = \Waka\ImportExport\Models\Import::create([
                'name' => 'Import de client',
                'data_source' => 'client',
                'is_editable' => 0,
                'import_model_class' => 'Wcli\\Ctm\\Classes\\Imports\\ClientsImport',
                'for_relation' => null,
                'relation' => null,
                'column_list' => null,
                'comment' => 'Import de base si le champs ID est vide, l\'application créera une nouvelle ligne sinon elle tentera une MAJ de la ligne',
                'is_scope' => null,
                'scopes' => null,
                'use_batch' => null,
                'created_at' => '2021-06-22 08:43:22',
                'updated_at' => '2021-06-22 08:43:22'
            ]);
 
    }

}
