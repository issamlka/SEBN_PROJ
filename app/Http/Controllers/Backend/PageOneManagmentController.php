<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageOneManagmentController extends Controller
{
    // the working one without keys
    public function ViewPageOne(Request $request)
    {
        // Define columns for "SELECT BY" dropdown
        $columns = [
            'WHS' => 'Warehouse (WHS)',
            
            'KEYS' => 'Keys',
            
            'MENU' => 'Menu',
           
        ];

        // Join tables
        $query = DB::table('pageone')
    ->leftJoin('pagetwo', 'pageone.ACCOUNT', '=', 'pagetwo.ACCOUNT')
    ->select(
        'pageone.ACCOUNT',
        'pageone.WHS',
        'pageone.WH_ACCESS_TYPE',
        'pageone.KEYS', // Add KEYS here
        'pageone.KEYS_ACCESS_TYPE',
        'pagetwo.NAME',
        'pagetwo.MENU',
        'pagetwo.GS_MENU'
    );

        // Apply filtering if needed
        if ($request->has('selectOption')) {
            $column = $request->selectOption;
            $query->where($column, 'like', "%{$request->optionsvalue}%");
        }

        // Fetch data
        $data = $query->get();

        // Fetch distinct column values correctly
        $options = [
            'WHS' => DB::table('pageone')->selectRaw('DISTINCT LEFT(WHS, 2) as WHS')->pluck('WHS'),
            'WH_ACCESS_TYPE' => DB::table('pageone')->distinct()->pluck('WH_ACCESS_TYPE'),
            'KEYS' => DB::table('pageone')->distinct()->pluck('KEYS'),
            'KEYS_ACCESS_TYPE' => DB::table('pageone')->distinct()->pluck('KEYS_ACCESS_TYPE'),
            'MENU' => DB::table('pagetwo')
            ->selectRaw('DISTINCT SUBSTRING_INDEX(MENU, "-", 1) as MENU')
            ->pluck('MENU'),
            'GS_MENU' => DB::table('pagetwo')->distinct()->pluck('GS_MENU'),
            'NAME' => DB::table('pagetwo')->distinct()->pluck('NAME')
        ];

        return view('admin.indexpone', compact('data', 'columns', 'options'));
    }
}
