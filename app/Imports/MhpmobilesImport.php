<?php

namespace App\Imports;

use App\Mhpmobile;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use Illuminate\Support\Carbon;

HeadingRowFormatter::default('none');

class MhpmobilesImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Mhpmobile([
            'asset_code' => $row['Asset'],
            'os' => isset($row['OS']) ? $row['OS'] : null,
            'services' => isset($row['Services']) ? $row['Services'] : null,
            'campus' => isset($row['Campus']) ? $row['Campus'] : null,
            'team' => isset($row['Team']) ? $row['Team'] : null,
            'floor' => isset($row['Floor']) ? $row['Floor'] : null,
            'location' => isset($row['Location']) ? $row['Location'] : null,
            'serial_number' => isset($row['Serial Number']) ? $row['Serial Number'] : null,
            'make' => isset($row['Make']) ? $row['Make'] : null,
            'model' => isset($row['Model']) ? $row['Model'] : null,
            'ram' => isset($row['RAM']) ? $row['RAM'] : null,
            'notes' => isset($row['Notes']) ? $row['Notes'] : null,
            'purchase_date' => isset($row['Purchase Date']) ? $row['Purchase Date'] : null,
            'mac_address' => isset($row['Mac Address']) ? $row['Mac Address'] : null,
            'printer_mapped' => isset($row['Printer Mapped']) ? $row['Printer Mapped'] : null,
            'replaced' => isset($row['Replaced']) ? $row['Replaced'] : null
        ]);
    }

    /**
     * Transform a date value into a Carbon object.
     *
     * @return \Carbon\Carbon|null
     */
    public function transformDate($value, $format = 'Y-m-d')
    {
        try {
            return Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
        } catch (\ErrorException $e) {
            return Carbon::createFromFormat($format, $value);
        }
    }
}
