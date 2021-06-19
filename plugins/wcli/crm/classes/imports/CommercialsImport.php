<?php namespace Wcli\Crm\Classes\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Wcli\Crm\Models\Commercial;

class CommercialsImport implements ToCollection, WithHeadingRow, WithCalculatedFormulas
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
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
}
