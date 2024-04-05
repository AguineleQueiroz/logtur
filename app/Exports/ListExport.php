<?php

namespace App\Exports;

use App\Models\PassengersList;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ListExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithColumnWidths
{
    private string $listId;

    /**
     * @param $id
     */
    public function __construct($id)
    {
        $this->listId = $id;
    }

    /**
     * @return string[]
     */
    public function headings(): array
    {
        return [
            'Nome',
            'Identidade',
            'Telefone'
        ];
    }

    /**
     * @param Worksheet $sheet
     * @return array[]
     */
    public function styles(Worksheet $sheet): array
    {
        return [
            // Style the first row as bold text.
            1    => [
                'font' => ['bold' => true],
            ],
        ];
    }

    /**
     * @return int[]
     */
    public function columnWidths(): array
    {
        return [
            'A' => 45,
            'B' => 12,
            'C' => 18,
        ];
    }

    /**
     * @param $passenger
     * @return array
     */
    public function map($passenger): array
    {
        return [
            $passenger['name'],
            $passenger['identity'],
            $passenger['phone']
        ];
    }

    /**
     * @return Collection
     */
    public function collection(): Collection
    {
        $list = json_decode((PassengersList::find($this->listId))->list, true);
        return collect($list);
    }
}
