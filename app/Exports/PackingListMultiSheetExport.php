<?php

namespace App\Exports;

use App\Models\Batch;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class PackingListMultiSheetExport implements WithMultipleSheets
{
    protected $packing_lists;

    public function __construct($batch_id)
    {
        $this->packing_lists = Batch::where('id',$batch_id)->first()->packing_lists;
    }

    public function sheets(): array
    {
        $sheets = [];

        foreach($this->packing_lists as $packing_list){
            $sheets[] = new PackingListExport($packing_list);
        }

        return $sheets;
    }
}
