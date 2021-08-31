<?php namespace Wcli\Crm\Classes\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithStyles;
//
use Wcli\Crm\Models\Client;

class ClientsExportVentes implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    public $parentId;

    public function __construct($listId, $parentId)
    {
        $this->parentId = $parentId;
    }

    //startKeep/

    public function headings(): array
    {
        return [
            'id',
            'amount',
            'gamme_id',
            'sale_at',
        ];
    }

    public function collection()
    {
        $parent = Client::find($this->parentId);
        $request = $parent->ventes()->get($this->headings());
       
        
        $request = $request->map(function ($item) {
                return $item;
        });;
        return $request;
    }

    public function styles(Worksheet $sheet)
    {
        return [
            'A'    => ['font' => ['bold' => true]],
            1 => ['font' => ['bold' => true]],
            'A1:A10' => [
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => ['argb' => 'FFFFFF00'],
                ],
            ],
        ];
    }

    //endKeep/
}
