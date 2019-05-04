<?php

namespace App\Exports;

use App\Rmh;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RmhsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Rmh::all([
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
