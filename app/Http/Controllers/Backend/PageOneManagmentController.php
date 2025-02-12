<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageOneManagmentController extends Controller
{
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
                'pageone.KEYS',
                'pagetwo.MENU'
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
            'KEYS' => DB::table('pageone')
                ->selectRaw('DISTINCT LEFT(`KEYS`, 2) as `KEYS`')
                ->pluck('KEYS'),
            'MENU' => DB::table('pagetwo')->distinct()->pluck('MENU'),
        ];

        return view('admin.indexpone', compact('data', 'columns', 'options'));
    }
}
