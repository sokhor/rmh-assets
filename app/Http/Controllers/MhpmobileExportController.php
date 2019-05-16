<?php

namespace App\Http\Controllers;

use App\Mhpmobile;
use Illuminate\Http\Request;
use App\Exports\MhpmobilesExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class MhpmobileExportController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return Excel::download(new MhpmobilesExport, 'Mhpmobiles.xlsx');
    }
}
