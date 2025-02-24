<?php

namespace App\Exports;

use App\Models\PageTwoManagment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PageTwoExport implements FromCollection, WithHeadings
{
    /**
     * Return the data to be exported.
     *
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // Retrieve all records from the PageTwoManagment model
        return PageTwoManagment::all(['ACCOUNT', 'NAME', 'MENU', 'GS_MENU']);
    }

    /**
     * Return the headings to be used in the Excel file.
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'ACCOUNT', 
            'NAME',    
            'MENU',     
            'GS MENU',  
        ];
    }
}
