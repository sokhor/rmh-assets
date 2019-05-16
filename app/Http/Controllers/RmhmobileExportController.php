<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\RmhmobilesExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class RmhmobileExportController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return Excel::download(new RmhmobilesExport, 'Rmhmobiles.xlsx');
    }
}
