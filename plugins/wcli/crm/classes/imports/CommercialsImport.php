<?php namespace Wcli\Crm\Classes\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Wcli\Crm\Models\Commercial;

class CommercialsImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $commercial = new Commercial();
            $commercial->id = $row['id'] ?? null;
            $commercial->save();
        }
    }
}
