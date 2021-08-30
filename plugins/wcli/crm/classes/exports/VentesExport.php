<?php namespace Wcli\Crm\Classes\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithStyles;
//
use Wcli\Crm\Models\Vente;

class VentesExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    public $listId;

    public function __construct($listId = null)
    {
        $this->listId = $listId;
    }

    //startKeep/

    public function headings(): array
    {
        return [
            'id',
            'name',
            'client_id',
            'sale_at',
            'amount',
            'gamme',
        ];
    }

    public function collection()
    {
        $request;
        if ($this->listId) {
            $request = Vente::whereIn('id', $this->listId)->get($this->headings());
        } else {
            $request = Vente::get($this->headings()); 
        }
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
            'A1:A50' => [
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => ['argb' => 'FFFFFF00'],
                ],
            ],
        ];
    }

    //endKeep/



    /**
    * MAJ DU SYSTHEME *****************************
    **/
//     public function headings(): array
//     {
//         return [
//             'id',
//             'name',
//             'client_id',
//             'sale_at',
//             'amount',
//             'gamme_id',
//         ];
//     }

//     public function collection()
//     {
//         $request;
//         if ($this->listId) {
//             $request = Vente::whereIn('id', $this->listId)->get($this->headings());
//         } else {
//             $request = Vente::get($this->headings()); 
//         }
//         $request = $request->map(function ($item) {
//                 return $item;
//         });;
//         return $request;
//     }
}
