<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\RpsExport;
use Maatwebsite\Excel\Excel;

class RpExportController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return Excel::download(new RpsExport, 'Rps.xlsx');
    }
}
