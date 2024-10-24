<?php

namespace App\Http\Controllers;

use App\Imports\StyleMcqImport;
use App\Models\Style;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class StyleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $styles = new Style();

        return view('style.index', compact('styles'));
    }


    public function create()
    {
        return view('style.create');
    }

    public function import()
    {

        $file = request()->file('file');
        $import = new StyleMcqImport();
        Excel::import($import, $file);

        return redirect()->back();
    }

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Style  $style
     * @return \Illuminate\Http\Response
     */
    public function show(Style $style)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Style  $style
     * @return \Illuminate\Http\Response
     */
    public function edit(Style $style)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Style  $style
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Style $style)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Style  $style
     * @return \Illuminate\Http\Response
     */
    public function destroy(Style $style)
    {
        //
    }
}
