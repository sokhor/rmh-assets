<?php

namespace App\Imports;

use App\Vidrl;
use Maatwebsite\Excel\Concerns\ToModel;

class VirdlsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Vidrl([
            'asset_code' => $row['Asset'],
            'os' => isset($row['OS']) ? $row['OS']: null,
            'building' => isset($row['Building']) ? $row['Building']: null,
            'campus' => isset($row['Campus']) ? $row['Campus']: null,
            'department' => isset($row['Department']) ? $row['Department']: null,
            'floor' => isset($row['Floor']) ? $row['Floor']: null,
            'location' => isset($row['Location']) ? $row['Location'] : null,
            'serial_number' => isset($row['Serial Number']) ? $row['Serial Number']: null,
            'make' => isset($row['Make']) ? $row['Make']: null,
            'model' => isset($row['Model']) ? $row['Model']: null,
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
