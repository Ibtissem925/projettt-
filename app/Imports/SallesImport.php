<?php

namespace App\Imports;

use App\Models\Salle;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;

class SallesImport implements ToModel, WithHeadingRow, SkipsEmptyRows
{
    /**
     * @param array $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Salle([
            'libelle'        => $row['name'] ?? $row['nom'] ?? $row['libelle'] ?? null,
            'capacity'       => $row['capacity'] ?? $row['capacite'] ?? 0,
            'localisation'   => $row['location'] ?? $row['localisation'] ?? null,
            'disponibilite'  => $row['disponibilite'] ?? true,
            'examen_id'      => $row['examen_id'] ?? null,
            'responsable_id' => $row['responsable_id'] ?? null,
        ]);
    }
}