<?php namespace Wcli\Crm\Models;

use Seeder;



class SeedCommercialWakaImportExportImport101 extends Seeder
{
    public function run()
    {
        \Waka\ImportExport\Models\Import::where('data_source', 'commercial')->delete();;
            
        $inject = \Waka\ImportExport\Models\Import::create([
                'name' => 'Import de commercial',
                'data_source' => 'commercial',
                'is_editable' => 0,
                'import_model_class' => 'Wcli\\Crm\\Classes\\Imports\\CommercialsImport',
                'for_relation' => 0,
                'relation' => '',
                'column_list' => '',
                'comment' => 'Import de base si le champs ID est vide, l\'application créera une nouvelle ligne sinon elle tentera une MAJ de la ligne',
                'is_scope' => 0,
                'scopes' => null,
                'use_batch' => 0,
                'created_at' => '2021-06-21 09:41:42',
                'updated_at' => '2021-06-21 09:45:20'
            ]);
 
    }

}
