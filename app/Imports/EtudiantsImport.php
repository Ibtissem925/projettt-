<?php

namespace App\Imports;

use App\Models\Etudiant;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;

class EtudiantsImport implements ToModel, WithHeadingRow, SkipsEmptyRows
{
    /**
     * @param array $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Etudiant([
            'nom'            => $row['nom'] ?? $row['name'],
            'prenom'         => $row['prenom'] ?? $row['surname'],
            'email'          => $row['email'],
            'password'       => bcrypt($row['password'] ?? 'password123'),
            'date_naissance' => null,
            'niveau'         => $row['niveau'] ?? $row['level'],
            'filiere'        => $row['filiere'] ?? $row['speciality'],
            'groupe'         => $row['groupe'] ?? $row['group'],
            'user_id'        => null,
            'planning_id'    => null,
        ]);
    }
}