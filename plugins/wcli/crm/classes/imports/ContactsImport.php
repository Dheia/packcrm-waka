<?php namespace Wcli\Crm\Classes\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Wcli\Crm\Models\Contact;

class ContactsImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $contact = new Contact();
            $contact->id = $row['id'] ?? null;
            $contact->save();
        }
    }
}
