<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PageTwoManagment;
use App\Exports\PageTwoExport;
use Maatwebsite\Excel\Facades\Excel;

class PageTwoManagmentController extends Controller
{
    public function ViewPageTwo()
    {
        $types = PageTwoManagment::all(); 
        return view('admin.index', compact('types'));
    }

    public function exportToExcel()
    {
        return Excel::download(new PageTwoExport, 'TABLE_TWO_DATA.xlsx');
    }
}
