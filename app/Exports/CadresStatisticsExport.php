<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class CadresStatisticsExport implements FromArray, WithHeadings, WithStyles, WithColumnWidths
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function array(): array
    {
        return array_map(function($row) {
            return [
                $row['categorie_cadre'],
                $row['cadres_count'],
                $row['grade_cadres_count'],
                $row['specialite_grades_count'],
                $row['cadre_name'],
                $row['specialite_fonctionnaires_count'],
                $row['total_fonctionnaires_count'],
                $row['formations_count'],
                $row['formation_names']
            ];
        }, $this->data);
    }

    public function headings(): array
    {
        return [
            'Catégorie Cadre / Spécialité-Grade',
            'Nb Cadres',
            'Nb Grades',
            'Nb Spécialités',
            'Nom du Cadre',
            'Nb Fonctionnaires (Spécialité)',
            'Total Fonctionnaires (Catégorie)',
            'Formations Sanitaires',
            'Noms de formations sanitaires'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Style for header row
        $sheet->getStyle('A1:I1')->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'],
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => 'FFC107'],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                ],
            ],
        ]);

        // Style for data rows
        $lastRow = count($this->data) + 1;
        $sheet->getStyle('A2:I' . $lastRow)->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                ],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_LEFT,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
        ]);

        // Center align numeric columns
        $sheet->getStyle('B2:D' . $lastRow)->applyFromArray([
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            ],
        ]);
        $sheet->getStyle('F2:H' . $lastRow)->applyFromArray([
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            ],
        ]);

        return [];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 30, // Catégorie Cadre / Spécialité-Grade
            'B' => 12, // Nb Cadres
            'C' => 12, // Nb Grades
            'D' => 15, // Nb Spécialités
            'E' => 25, // Nom du Cadre
            'F' => 20, // Nb Fonctionnaires (Spécialité)
            'G' => 20, // Total Fonctionnaires (Catégorie)
            'H' => 20, // Formations Sanitaires
            'I' => 50, // Noms de formations sanitaires
        ];
    }
}
