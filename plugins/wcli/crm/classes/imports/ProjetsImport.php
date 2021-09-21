<?php namespace Wcli\Crm\Classes\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use \PhpOffice\PhpSpreadsheet\Shared\Date as DateConvert;
use Wcli\Crm\Models\Projet;

class ProjetsImport implements ToCollection, WithHeadingRow, WithCalculatedFormulas
{
    //startKeep/
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            if(!$row->filter()->isNotEmpty()) {
                continue;
            }
            $projet = null;
            $id = $row['id'] ?? null;
            if($id) {
                $projet = Projet::find($id);
            }
            if(!$projet) {
                $projet = new Projet();
            }
            $projet->id = $row['id'] ?? null;
            $projet->name = $row['name'] ?? null;
            $projet->code = $row['code'] ?? null;
            $projet->Description = $row['Description'] ?? null;
            $projet->client_id = $row['client_id'] ?? null;
            $projet->chef_projet_id = $row['chef_projet_id'] ?? null;
            $projet->sale_at = DateConvert::excelToDateTimeObject($row['sale_at'] ?? null);
            $projet->total_ht = $row['total_ht'] ?? null;
            $projet->total_ttc = $row['total_ttc'] ?? null;
            $projet->total_remise = $row['total_remise'] ?? null;
            $projet->total_avant_remise = $row['total_avant_remise'] ?? null;
            $projet->save();
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
//            $projet = null;
//            $id = $row['id'] ?? null;
//            if($id) {
//                $projet = Projet::find($id);
//             }
//             if(!$projet) {
//                 $projet = new Projet();
//             }
//             $projet->id = $row['id'] ?? null;
//             $projet->name = $row['name'] ?? null;
//             $projet->code = $row['code'] ?? null;
//             $projet->Description = $row['Description'] ?? null;
//             $projet->client_id = $row['client_id'] ?? null;
//             $projet->contact_id = $row['contact_id'] ?? null;
//             $projet->sale_at = $row['sale_at'] ?? null;
//             $projet->total_ht = $row['total_ht'] ?? null;
//             $projet->total_ttc = $row['total_ttc'] ?? null;
//             $projet->total_remise = $row['total_remise'] ?? null;
//             $projet->total_avant_remise = $row['total_avant_remise'] ?? null;
//             $projet->save();
//         }
//     }
}
