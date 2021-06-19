<?php namespace Wcli\Crm\Classes\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Wcli\Crm\Models\Client;

class ClientsImport implements ToCollection, WithHeadingRow, WithCalculatedFormulas
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
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
            $client->secteur_id = $row['secteur_id'] ?? null;
            $client->commercial_id = $row['commercial_id'] ?? null;
            $client->save();
        }
    }
}
