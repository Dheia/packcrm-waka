<?php namespace Wcli\Crm\Classes\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use \PhpOffice\PhpSpreadsheet\Shared\Date as DateConvert;
use Wcli\Crm\Models\ProjetProduit;

class ProjetProduitsImport implements ToCollection, WithHeadingRow, WithCalculatedFormulas
{
    //startKeep/
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            if(!$row->filter()->isNotEmpty()) {
                continue;
            }
            $projetProduit = null;
            $id = $row['id'] ?? null;
            if($id) {
                $projetProduit = ProjetProduit::find($id);
            }
            if(!$projetProduit) {
                $projetProduit = new ProjetProduit();
            }
            $projetProduit->id = $row['id'] ?? null;
            $projetProduit->name = $row['name'] ?? null;
            $projetProduit->slug = $row['slug'] ?? null;
            $projetProduit->description = $row['description'] ?? null;
            $projetProduit->tags = $row['tags'] ?? null;
            $projetProduit->couleur = $row['couleur'] ?? null;
            $projetProduit->save();
        }
    }
    //endKeep/


    /**
     * SAUVEGARDE DES MODIFS MC
     */
//     public function collection(Collection $rows)
//     {
//        foreach ($rows as $row) {
//            if(!$row->filter()->isNotEmpty()) {
//                continue;
//            }
//            $projetProduit = null;
//            $id = $row['id'] ?? null;
//            if($id) {
//                $projetProduit = ProjetProduit::find($id);
//             }
//             if(!$projetProduit) {
//                 $projetProduit = new ProjetProduit();
//             }
//             $projetProduit->id = $row['id'] ?? null;
//             $projetProduit->name = $row['name'] ?? null;
//             $projetProduit->slug = $row['slug'] ?? null;
//             $projetProduit->description = $row['description'] ?? null;
//             $projetProduit->tags = $row['tags'] ?? null;
//             $projetProduit->couleur = $row['couleur'] ?? null;
//             $projetProduit->save();
//         }
//     }
}
