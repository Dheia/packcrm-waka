<?php namespace Wcli\Crm\Classes\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Wcli\Crm\Models\Secteur;

class SecteursImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $secteur = new Secteur();
            $secteur->id = $row['id'] ?? null;
            $secteur->name = $row['name'] ?? null;
            $secteur->code = $row['code'] ?? null;
            $secteur->description = $row['description'] ?? null;
            $secteur->save();
        }
    }
}
