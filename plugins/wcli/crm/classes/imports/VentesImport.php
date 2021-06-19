<?php namespace Wcli\Crm\Classes\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Wcli\Crm\Models\Vente;

class VentesImport implements ToCollection, WithHeadingRow, WithCalculatedFormulas
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $vente = null;
            $id = $row['id'] ?? null;
            if($id) {
                $vente = Vente::find($id);
            }
            if(!$vente) {
                $vente = new Vente();
            }
            $vente->id = $row['id'] ?? null;
            $vente->name = $row['name'] ?? null;
            $vente->client_id = $row['client_id'] ?? null;
            $vente->sale_at = $row['sale_at'] ?? null;
            $vente->amount = $row['amount'] ?? null;
            $vente->save();
        }
    }
}
