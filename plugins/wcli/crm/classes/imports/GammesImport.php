<?php namespace Wcli\Crm\Classes\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use \PhpOffice\PhpSpreadsheet\Shared\Date as DateConvert;
use Wcli\Crm\Models\Gamme;

class GammesImport implements ToCollection, WithHeadingRow, WithCalculatedFormulas
{
    //startKeep/
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            if(!$row->filter()->isNotEmpty()) {
                continue;
            }
            $gamme = null;
            $id = $row['id'] ?? null;
            if($id) {
                $gamme = Gamme::find($id);
            }
            if(!$gamme) {
                $gamme = new Gamme();
            }
            $gamme->id = $row['id'] ?? null;
            $gamme->name = $row['name'] ?? null;
            $gamme->slug = $row['slug'] ?? null;
            $gamme->description = $row['description'] ?? null;
            $gamme->couleur = $row['couleur'] ?? null;
            $gamme->parent_id = $row['parent_id'] ?? null;
            $gamme->nest_depth = $row['nest_depth'] ?? null;

            $gamme->save();
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
//            $gamme = null;
//            $id = $row['id'] ?? null;
//            if($id) {
//                $gamme = Gamme::find($id);
//             }
//             if(!$gamme) {
//                 $gamme = new Gamme();
//             }
//             $gamme->id = $row['id'] ?? null;
//             $gamme->name = $row['name'] ?? null;
//             $gamme->slug = $row['slug'] ?? null;
//             $gamme->description = $row['description'] ?? null;
//             $gamme->couleur = $row['couleur'] ?? null;
//             $gamme->save();
//         }
//     }
}
