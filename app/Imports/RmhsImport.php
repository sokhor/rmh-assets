<?php

namespace App\Imports;

use App\Rmh;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use Illuminate\Support\Carbon;

HeadingRowFormatter::default('none');

class RmhsImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Rmh([
            'asset_code' => $row['Asset'],
            'os' => $row['OS'],
            'building' => $row['Building'],
            'campus' => $row['Campus'],
            'department' => $row['Department'],
            'floor' => $row['Floor'],
            'location' => isset($row['Location']) ? $row['Location'] : null,
            'serial_number' => $row['Serial Number'],
            'make' => $row['Make'],
            'model' => $row['Model'],
            'ram' => isset($row['RAM']) ? $row['RAM'] : null,
            'notes' => isset($row['Notes']) ? $row['Notes'] : null,
            'purchase_date' => isset($row['Purchase Date']) ? $this->transformDate($row['Purchase Date']) : null,
            'mac_address' => isset($row['MAC Address']) ? $row['MAC Address'] : null,
            'replaced' => isset($row['Replaced']) ? $row['Replaced'] : null,
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
