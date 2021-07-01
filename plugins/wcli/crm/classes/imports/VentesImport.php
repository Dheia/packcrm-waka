<?php namespace Wcli\Crm\Classes\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Wcli\Crm\Models\Vente;
use \PhpOffice\PhpSpreadsheet\Shared\Date as DateConvert;

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
            $vente->sale_at = DateConvert::excelToDateTimeObject($row['sale_at'] ?? null);
            $vente->amount = $row['amount'] ?? null;
            $vente->gamme = $row['gamme'] ?? null;
            $vente->save();
        }
    }
}
