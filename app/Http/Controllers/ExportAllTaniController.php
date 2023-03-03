<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tani;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportAllTaniController extends Controller implements FromCollection
{    
	public function export()
    {
        $tanis = Tani::all();

        return Excel::download($this, 'tanis.xlsx');
    }

    public function collection()
    {
        return Tani::all();
    }
}
