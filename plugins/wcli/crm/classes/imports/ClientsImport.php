<?php namespace Wcli\Crm\Classes\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Wcli\Crm\Models\Client;

class ClientsImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $client = new Client();
            $client->id = $row['id'] ?? null;
            $client->save();
        }
    }
}
