<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class VidrlsExport implements FromCollection, WithHeadings
{

    use Exportable;

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Vidrl::all([
            'asset_code',
            'os',
            'building',
            'campus',
            'department',
            'floor',
            'location',
            'serial_number',
            'make',
            'model',
            'ram',
            'notes',
            'purchase_date',
            'mac_address',
            'replaced',
        ]);
    }

    public function headings(): array
    {
        return [
            'Asset',
            'OS',
            'Building',
            'Campus',
            'Department',
            'Floor',
            'Location',
            'Serial Number',
            'Make',
            'Model',
            'RAM',
            'Notes',
            'Purchase Date',
            'MAC Address',
            'Replaced'
        ];
    }
}
