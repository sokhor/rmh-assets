<?php

namespace App\Exports;

use App\Mhpmobile;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class MhpmobilesExport implements FromCollection, WithHeadings
{
    use Exportable;

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Mhpmobile::all([
            'asset_code',
            'os',
            'services',
            'campus',
            'team',
            'floor',
            'location',
            'serial_number',
            'make',
            'model',
            'ram',
            'notes',
            'purchase_date',
            'mac_address',
            'printer_mapped',
            'replaced',
        ]);
    }

    public function headings(): array
    {
        return [
            'Asset Code',
            'OS',
            'Services',
            'Campus',
            'Team',
            'Floor',
            'Location',
            'Serial Number',
            'Make',
            'Model',
            'RAM',
            'Notes',
            'Purchase Date',
            'MAC Dddress',
            'Printer Mapped',
            'Replaced',
        ];
    }
}
