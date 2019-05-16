<?php

namespace App\Http\Controllers;

use App\Vidrl;
use Illuminate\Http\Request;
use App\Imports\VidrlsImport;


class VidrlImportController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //return $request->file('excelFile')->getFilename();

        Excel::import(new VidrlsImport, $request->file('excelFile'));

        return response()->json(['message' => 'Successfully imported'], 201);
    }
}
