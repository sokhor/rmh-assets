<?php

namespace App\Imports;

use App\Rmh;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Carbon;

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
            'asset_code' => $row['asset_code'],
            'os' => $row['os'],
            'building' => $row['building'],
            'campus' => $row['campus'],
            'department' => $row['department'],
            'floor' => $row['floor'],
            'location' => isset($row['location']) ? $row['location'] : null,
            'serial_number' => $row['serial_number'],
            'make' => $row['make'],
            'model' => $row['model'],
            'ram' => isset($row['ram']) ? $row['ram'] : null,
            'notes' => isset($row['notes']) ? $row['notes'] : null,
            'purchase_date' => isset($row['purchase_date']) ? $this->transformDate($row['purchase_date']) : null,
            'mac_address' => isset($row['mac_address']) ? $row['mac_address'] : null,
            'replaced' => isset($row['replaced']) ? $row['replaced'] : null,
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
