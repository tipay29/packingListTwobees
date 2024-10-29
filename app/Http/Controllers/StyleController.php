<?php

namespace App\Http\Controllers;

use App\Imports\StyleMcqImport;
use App\Models\Style;
use App\Models\StyleMcqContent;
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
        $styles = Style::paginate(15);

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


    public function show(Style $style)
    {
        //
    }

    public function showContent(Style $style)
    {
        $style_code = $style->style_code;
        $contents = $style->mcq_contents;
        return view('style.show-content',compact('contents','style_code'));
    }

    public function edit(Style $style)
    {
        //
    }


    public function update(Request $request, Style $style)
    {
        //
    }


    public function destroy(Style $style)
    {
        $style->mcq_contents()->delete();
        $style->delete();
        return redirect(route('styles.index'));
    }

    public function destroyPerContent(StyleMcqContent $content){

        $content->delete();

        return redirect()->back();
    }
}
