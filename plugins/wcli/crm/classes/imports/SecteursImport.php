<?php namespace Wcli\Crm\Classes\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use \PhpOffice\PhpSpreadsheet\Shared\Date as DateConvert;
use Wcli\Crm\Models\Secteur;

class SecteursImport implements ToCollection, WithHeadingRow, WithCalculatedFormulas
{
    //startKeep/
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            if(!$row->filter()->isNotEmpty()) {
                continue;
            }
            $secteur = null;
            $id = $row['id'] ?? null;
            if($id) {
                $secteur = Secteur::find($id);
            }
            if(!$secteur) {
                $secteur = new Secteur();
            }
            $secteur->id = $row['id'] ?? null;
            $secteur->name = $row['name'] ?? null;
            $secteur->slug = $row['slug'] ?? null;
            $secteur->description = $row['description'] ?? null;
            $secteur->msg_approche = $row['msg_approche'] ?? null;
            $secteur->msg_kpi = $row['msg_kpi'] ?? null;
            $secteur->parent_id = $row['parent_id'] ?? null;
            $secteur->save();
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
//            $secteur = null;
//            $id = $row['id'] ?? null;
//            if($id) {
//                $secteur = Secteur::find($id);
//             }
//             if(!$secteur) {
//                 $secteur = new Secteur();
//             }
//             $secteur->id = $row['id'] ?? null;
//             $secteur->name = $row['name'] ?? null;
//             $secteur->slug = $row['slug'] ?? null;
//             $secteur->description = $row['description'] ?? null;
//             $secteur->msg_approche = $row['msg_approche'] ?? null;
//             $secteur->msg_kpi = $row['msg_kpi'] ?? null;
//             $secteur->parent_id = $row['parent_id'] ?? null;
//             $secteur->save();
//         }
//     }
}
