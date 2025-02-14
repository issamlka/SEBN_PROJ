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
        // Apply filter based on the selected option and value
        if ($this->selectOption && $this->optionsvalue) {
            return PageOneManagment::join('pagetwo', 'pageone.ACCOUNT', '=', 'pagetwo.ACCOUNT')
                ->select('pageone.ACCOUNT', 'pageone.WHS', 'pageone.KEYS', 'pagetwo.MENU')
                ->where($this->selectOption, 'like', '%' . $this->optionsvalue . '%')
                ->get();
        }

        // Return all data if no filter is selected
        return PageOneManagment::all();
    }
}
