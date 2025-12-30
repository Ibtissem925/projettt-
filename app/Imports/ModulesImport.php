<?php

namespace App\Imports;

use App\Models\Module;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ModulesImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Module([
            'name'          => $row['name'] ?? $row['nom'],
            'code'          => $row['code'],
            'specialite'    => $row['specialite'] ?? $row['speciality'],
            'groupe'        => $row['groupe'] ?? $row['group'] ?? null,
            'enseignant_id' => $row['enseignant_id'] ?? $row['teacher_id'] ?? null,
        ]);
    }
}