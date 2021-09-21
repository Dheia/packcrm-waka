<?php namespace Wcli\Crm\Classes\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use \PhpOffice\PhpSpreadsheet\Shared\Date as DateConvert;
use Wcli\Crm\Models\Produit;

class ProduitsImport implements ToCollection, WithHeadingRow, WithCalculatedFormulas
{
    //startKeep/
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            if(!$row->filter()->isNotEmpty()) {
                continue;
            }
            $produit = null;
            $id = $row['id'] ?? null;
            if($id) {
                $produit = Produit::find($id);
            }
            if(!$produit) {
                $produit = new Produit();
            }
            $produit->id = $row['id'] ?? null;
            $produit->name = $row['name'] ?? null;
            $produit->code = $row['code'] ?? null;
            $produit->description = $row['description'] ?? null;
            $produit->gamme_id = $row['gamme_id'] ?? null;
            $produit->image = $row['image'] ?? null;
            $produit->save();
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
//            $produit = null;
//            $id = $row['id'] ?? null;
//            if($id) {
//                $produit = Produit::find($id);
//             }
//             if(!$produit) {
//                 $produit = new Produit();
//             }
//             $produit->id = $row['id'] ?? null;
//             $produit->name = $row['name'] ?? null;
//             $produit->gamme_id = $row['gamme_id'] ?? null;
//             $produit->code = $row['code'] ?? null;
//             $produit->description = $row['description'] ?? null;
//             $produit->image = $row['image'] ?? null;
//             $produit->save();
//         }
//     }
}
