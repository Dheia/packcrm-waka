<?php namespace Wcli\Crm\Classes\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use \PhpOffice\PhpSpreadsheet\Shared\Date as DateConvert;
use Wcli\Crm\Models\Client;

class ClientsImport implements ToCollection, WithHeadingRow, WithCalculatedFormulas
{
    //startKeep/
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            if(!$row->filter()->isNotEmpty()) {
                continue;
            }
            $client = null;
            $id = $row['id'] ?? null;
            if($id) {
                $client = Client::find($id);
            }
            if(!$client) {
                $client = new Client();
            }
            $client->id = $row['id'] ?? null;
            $client->name = $row['name'] ?? null;
            $client->slug = $row['slug'] ?? null;
            $client->commercial_id = $row['commercial_id'] ?? null;
            $client->save();
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
//            $client = null;
//            $id = $row['id'] ?? null;
//            if($id) {
//                $client = Client::find($id);
//             }
//             if(!$client) {
//                 $client = new Client();
//             }
//             $client->id = $row['id'] ?? null;
//             $client->name = $row['name'] ?? null;
//             $client->slug = $row['slug'] ?? null;
//             $client->commercial_id = $row['commercial_id'] ?? null;
//             $client->save();
//         }
//     }
}
