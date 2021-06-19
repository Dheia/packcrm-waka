<?php namespace Wcli\Crm\Classes\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Wcli\Crm\Models\Secteur;

class SecteursImport implements ToCollection, WithHeadingRow, WithCalculatedFormulas
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $secteur = null;
            $id = $row['id'] ?? null;
            if($id) {
                $secteur = Secteur::find($id);
            }
            if(!$secteur) {
                $secteur = new Secteur();
            }
            $secteur->id = $row['id'] ?? null;
            $secteur->name = $row['name'] ?? null;
            $secteur->slug = $row['slug'] ?? null;
            $secteur->description = $row['description'] ?? null;
            $parentId = $row['parent_id'] ?? null;
            $parent = Secteur::find($parentId);
            $secteur->parent = $parent;
            $secteur->save();
        }
    }
}
