<?php

namespace App\Exports;

use App\Models\PageOneManagment;
use App\Models\PageTwoManagment;
use Maatwebsite\Excel\Concerns\FromCollection;


class PageOneExport implements FromCollection
{
    protected $selectOption;
    protected $optionsvalue;

    public function __construct($selectOption, $optionsvalue)
    {
        $this->selectOption = $selectOption;
        $this->optionsvalue = $optionsvalue;
    }

    public function collection()
{
    
    $headers = [
        ['ACCOUNT', 'WHS', 'KEYS', 'MENU'] 
    ];

    // Apply filter based on the selected option and value
    if ($this->selectOption && $this->optionsvalue) {
        $data = PageOneManagment::join('xu_tbl_users', 'xu_tbl_keys.ACCOUNT', '=', 'xu_tbl_users.ACCOUNT')
            ->select('xu_tbl_keys.ACCOUNT', 'xu_tbl_keys.WHS', 'xu_tbl_keys.KEYS', 'xu_tbl_users.MENU')
            ->where($this->selectOption, 'like', '%' . $this->optionsvalue . '%')
            ->get()
            ->toArray();
    } else {
        // Return all data if no filter is selected
        $data = PageOneManagment::all(['ACCOUNT', 'WHS', 'KEYS'])->toArray();
    }

    // Merge headers with data
    return collect(array_merge($headers, $data));
}

}
