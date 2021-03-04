<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;



class StudentsImport implements ToModel, WithValidation, WithHeadingRow
{
    use Importable;

    public function model(array $row)
    {

        return new Student([
            'school_classes_id' => $row['school_classes_id'],
            'name' => $row['name'],
            'email' => $row['email'],
         ]);
    }

    public function startRow(): int{
        return 2;
    }

    public function rules(): array
    {
        return [
            'school_classes_id' => 'required',
            'name' => 'required',
            'email' => 'required|unique:students',
            'image' => 'nullable',
        ];
    }

}
