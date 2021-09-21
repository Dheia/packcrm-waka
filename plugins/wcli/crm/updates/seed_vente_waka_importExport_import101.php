<?php namespace Wcli\Crm\Models;

use Seeder;



class SeedVenteWakaImportExportImport101 extends Seeder
{
    public function run()
    {
        \Waka\ImportExport\Models\Import::where('data_source', 'vente')->delete();;
            
        $inject = \Waka\ImportExport\Models\Import::create([
                'name' => 'Import de vente',
                'data_source' => 'vente',
                'is_editable' => 0,
                'import_model_class' => 'Wcli\\Crm\\Classes\\Imports\\VentesImport',
                'for_relation' => null,
                'relation' => null,
                'column_list' => null,
                'comment' => 'Import de base si le champs ID est vide, l\'application créera une nouvelle ligne sinon elle tentera une MAJ de la ligne',
                'is_scope' => null,
                'scopes' => null,
                'use_batch' => null,
                'created_at' => '2021-06-22 08:23:46',
                'updated_at' => '2021-06-22 08:23:46'
            ]);
 
    }

}
