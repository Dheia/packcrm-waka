<?php namespace Wcli\Crm\Classes\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Wcli\Crm\Models\Contact;

class ContactsImport implements ToCollection, WithHeadingRow, WithCalculatedFormulas
{
    //startKeep/
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            if(!$row->filter()->isNotEmpty()) {
                continue;
            }
            $contact = null;
            $id = $row['id'] ?? null;
            if($id) {
                $contact = Contact::find($id);
            }
            if(!$contact) {
                $contact = new Contact();
            }
            $contact->id = $row['id'] ?? null;
            $contact->name = $row['name'] ?? null;
            $contact->first_name = $row['first_name'] ?? null;
            $contact->last_name = $row['last_name'] ?? null;
            $contact->tel = $row['tel'] ?? null;
            $contact->email = $row['email'] ?? null;
            $contact->client_id = $row['client_id'] ?? null;
            $contact->commercial_id = $row['commercial_id'] ?? null;
            $contact->save();
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
//            $contact = null;
//            $id = $row['id'] ?? null;
//            if($id) {
//                $contact = Contact::find($id);
//             }
//             if(!$contact) {
//                 $contact = new Contact();
//             }
//             $contact->id = $row['id'] ?? null;
//             $contact->name = $row['name'] ?? null;
//             $contact->first_name = $row['first_name'] ?? null;
//             $contact->last_name = $row['last_name'] ?? null;
//             $contact->tel = $row['tel'] ?? null;
//             $contact->email = $row['email'] ?? null;
//             $contact->client_id = $row['client_id'] ?? null;
//             $contact->commercial_id = $row['commercial_id'] ?? null;
//             $contact->save();
//         }
//     }
}
