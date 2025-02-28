<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PageOneExport;


class PageOneManagmentController extends Controller
{
    public function ViewPageOne(Request $request)
{
    // Define columns for the dropdown
    $columns = [
        'WHS' => 'Warehouse (WHS)',
        'KEYS' => 'Keys',
        'MENU' => 'Menu',
    ];

    // Define the base query to get data
    $query = DB::table('xu_tbl_keys')
        ->leftJoin('xu_tbl_users', 'xu_tbl_keys.ACCOUNT', '=', 'xu_tbl_users.ACCOUNT')
        ->select('xu_tbl_keys.ACCOUNT', 'xu_tbl_keys.WHS', 'xu_tbl_keys.KEYS', 'xu_tbl_users.MENU');

    // Query to fetch data initially without any filters
    $data = $query->get();

    // Prepare options for dropdowns
    $options = [
        'WHS' => DB::table('xu_tbl_keys')->selectRaw('DISTINCT LEFT(WHS, 2) as WHS')->orderBy('WHS', 'asc')->pluck('WHS'),
        'KEYS' => DB::table('xu_tbl_keys')->selectRaw('DISTINCT LEFT(`KEYS`, 2) as `KEYS`')->orderBy('KEYS', 'asc')->pluck('KEYS'),
        'MENU' => DB::table('xu_tbl_users')->distinct()->orderBy('MENU', 'asc')->pluck('MENU'),
    ];

    // Handle filtering via AJAX
    if ($request->ajax()) {
        if ($request->has('selectOption') && $request->has('optionsvalue')) {
            $column = $request->selectOption;
            $value = $request->optionsvalue;
            $data = $query->where($column, 'like', "%{$value}%")->get();

            return response()->json([
                'data' => $data,
                'columns' => $columns,
                'options' => $options

            ]);
        }

    }

    // Handle export to Excel
    if ($request->has('export')) {
        $selectOption = $request->selectOption;
        $optionsvalue = $request->optionsvalue;
    
    
        $filename = 'TABLE_ONE_' . ($selectOption ?: 'export') . '.xlsx';
    
        return Excel::download(new xu_tbl_keysExport($selectOption, $optionsvalue), $filename);
    }
    

    
    return view('admin.indexpone', compact('data', 'columns', 'options'));
}

// Separate function to get pie chart data
public function getPieChartData()
{
    $totalKeys = DB::table('xu_tbl_keys')->count();

    // Get count of each KEYS prefix
    $keysData = DB::table('xu_tbl_keys')
        ->selectRaw('LEFT(`KEYS`, 2) as KEYS_PREFIX, COUNT(*) as count')
        ->groupBy('KEYS_PREFIX')
        ->orderBy('KEYS_PREFIX', 'asc')
        ->get();

    // Prepare response
    $labels = $keysData->pluck('KEYS_PREFIX');
    $counts = $keysData->pluck('count');

    // Calculate percentages
    $percentages = $counts->map(function ($count) use ($totalKeys) {
        return round(($count / $totalKeys) * 100, 2);
    });

    return response()->json([
        'labels' => $labels,
        'percentages' => $percentages,
    ]);
}
}
