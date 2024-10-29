<?php

namespace App\Http\Controllers;

use App\Exports\PackingListExport;
use App\Exports\PackingListMultiSheetExport;
use App\Imports\PackingListImport;
use App\Models\Batch;
use App\Models\PackingList;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PackingListController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $batches = Batch::paginate(15);

        return view('packing-list.index', compact('batches'));
    }


    public function create()
    {
        $last_batch = Batch::max('id');

        if($last_batch === null){
            $last_batch = 1;
        }else{
            $last_batch++;
        }

        return view('packing-list.create',compact('last_batch'));
    }

    public function import()
    {

        $file = request()->file('file');
        $import = new PackingListImport(intval(request()->batch));
        Excel::import($import, $file);

        $batch = Batch::create([
            'id' => request()->batch,
            'season' => request()->season,
            'buy_year' => request()->buy_year,
            'buy_month' => request()->buy_month,
            'user_id' => auth()->user()->id,
        ]);

//        Excel::download(new PackingListMultiSheetExport($batch->id), 'packing_lists.xlsx');

        return redirect(route('packing-lists.show-batch',$batch->id));

    }

    public function export($batch,$factory_po)
    {

        return Excel::download(new PackingListMultiSheetExport($batch,$factory_po), $factory_po.'.xlsx');

    }

    public function store()
    {

    }


    public function show(PackingList $packingList)
    {
        //
    }

    public function showBatch($batch)
    {
        $factory_pos = PackingList::where('batch_id',$batch)->distinct()->pluck('pl_factory_po');

        return view('packing-list.show-batch',compact('factory_pos','batch'));
    }


    public function edit(PackingList $packingList)
    {
        //
    }


    public function update(Request $request, PackingList $packingList)
    {
        //
    }


    public function destroy(PackingList $packingList)
    {
        //
    }

    public function destroyPerPO($batch,$factory_po){
        $packing_lists = PackingList::where([
            'batch_id' => $batch,
            'pl_factory_po' => $factory_po,
        ])->get();

        foreach($packing_lists as $packing_list){
            $packing_list->delete();
        }

        return redirect(route('packing-lists.show-batch',$batch));
    }

    public function destroyPerBatch(Batch $batch){

        $batch->packing_lists()->delete();
        $batch->delete();

        return redirect(route('packing-lists.index'));
    }
}
