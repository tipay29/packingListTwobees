<?php

namespace App\Exports;

use App\Models\Batch;
use App\Models\PackingList;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class PackingListMultiSheetExport implements WithMultipleSheets
{
    protected $packing_lists;

    public function __construct($batch_id,$factory_po)
    {
        $this->packing_lists = PackingList::where([
            'batch_id' => $batch_id,
            'pl_factory_po' => $factory_po
        ])->get();
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
