<?php namespace Wcli\Crm\Classes\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use \PhpOffice\PhpSpreadsheet\Shared\Date as DateConvert;
use Wcli\Crm\Models\Commercial;

class CommercialsImport implements ToCollection, WithHeadingRow, WithCalculatedFormulas
{
    //startKeep/
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            if(!$row->filter()->isNotEmpty()) {
                continue;
            }
            $commercial = null;
            $id = $row['id'] ?? null;
            if($id) {
                $commercial = Commercial::find($id);
            }
            if(!$commercial) {
                $commercial = new Commercial();
            }
            $commercial->id = $row['id'] ?? null;
            $commercial->name = $row['name'] ?? null;
            $commercial->first_name = $row['first_name'] ?? null;
            $commercial->last_name = $row['last_name'] ?? null;
            $commercial->tel = $row['tel'] ?? null;
            $commercial->email = $row['email'] ?? null;
            $commercial->save();
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
//            $commercial = null;
//            $id = $row['id'] ?? null;
//            if($id) {
//                $commercial = Commercial::find($id);
//             }
//             if(!$commercial) {
//                 $commercial = new Commercial();
//             }
//             $commercial->id = $row['id'] ?? null;
//             $commercial->name = $row['name'] ?? null;
//             $commercial->first_name = $row['first_name'] ?? null;
//             $commercial->last_name = $row['last_name'] ?? null;
//             $commercial->tel = $row['tel'] ?? null;
//             $commercial->email = $row['email'] ?? null;
//             $commercial->save();
//         }
//     }
}
