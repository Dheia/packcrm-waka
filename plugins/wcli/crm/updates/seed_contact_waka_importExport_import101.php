<?php namespace Wcli\Crm\Models;

use Seeder;



class SeedContactWakaImportExportImport101 extends Seeder
{
    public function run()
    {
        \Waka\ImportExport\Models\Import::where('data_source', 'contact')->delete();;
            
        $inject = \Waka\ImportExport\Models\Import::create([
                'name' => 'Import de contact',
                'data_source' => 'contact',
                'is_editable' => 0,
                'import_model_class' => 'Wcli\\Crm\\Classes\\Imports\\ContactsImport',
                'for_relation' => 0,
                'relation' => '',
                'column_list' => '',
                'comment' => 'Import de base si le champs ID est vide, l\'application créera une nouvelle ligne sinon elle tentera une MAJ de la ligne',
                'is_scope' => 0,
                'scopes' => null,
                'use_batch' => 0,
                'created_at' => '2021-06-21 09:41:32',
                'updated_at' => '2021-06-21 09:45:39'
            ]);
 
    }

}
