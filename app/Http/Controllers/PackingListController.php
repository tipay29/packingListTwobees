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
        $packinglists = new PackingList();

        return view('packing-list.index', compact('packinglists'));
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

        return Excel::download(new PackingListMultiSheetExport($batch->id), 'packing_lists.xlsx');
    }

    public function store()
    {

    }


    public function show(PackingList $packingList)
    {
        //
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
}
