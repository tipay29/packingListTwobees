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
        $styles = Style::orderBy('id','DESC')->paginate(15);

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

        $styles = Style::orderBy('id','DESC')->paginate(15);

        return view('style.index', compact('styles'))->with('success','Import Successfully!!!');
    }

    public function showContent(Style $style)
    {
        $style_code = $style->style_code;
        $contents = $style->mcq_contents;
        return view('style.show-content',compact('contents','style_code'));
    }

    public function destroy(Style $style)
    {
        $style->mcq_contents()->delete();
        $style->delete();

        $styles = Style::orderBy('id','DESC')->paginate(15);

        return view('style.index', compact('styles'))->with('success','Delete Successfully!!!');
    }

    public function destroyPerContent(StyleMcqContent $content){

        $style = Style::where('id',$content->style_id)->first();

        $content->delete();

        $style_code = $style->style_code;
        $contents = $style->mcq_contents;

        if(count($style->mcq_contents) === 0){
            $style->delete();
            $styles = Style::orderBy('id', 'DESC')->paginate(15);
            return view('style.index', compact('styles'))
                ->with('success','Delete Successfully!!!');
        }


        return view('style.show-content',compact('contents','style_code'))->with('success','Import Successfully!!!');
    }
}
