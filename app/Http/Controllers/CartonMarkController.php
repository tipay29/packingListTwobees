<?php

namespace App\Http\Controllers;

use App\Models\CartonMark;
use Illuminate\Support\Facades\Storage;

class CartonMarkController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $carton_marks = CartonMark::orderBy('id','DESC')->paginate(10);

        return view('carton-mark.index', compact('carton_marks'));
    }

    public function create()
    {
        return view('carton-mark.create');
    }

    public function store()
    {
        $this->validateRequest();

        $pathname = '/storage/images/carton-mark/';
        $pathname_two = '/public/images/carton-mark/';
        $filename = request()->cm_customer . '.png';
        $wholename = $pathname.$filename;
        $image = request()->file('file');
        $image->storeAs($pathname_two, $filename);

        $carton_mark = CartonMark::create([
            'cm_customer' => request()->cm_customer,
            'cm_image_path' => $wholename,
            'user_id' => auth()->user()->id,
        ]);

        $carton_marks = CartonMark::orderBy('id','DESC')->paginate(10);

        return view('carton-mark.index', compact('carton_marks'))->with('success','Added Successfully!!!');

    }

    public function destroy(CartonMark $cartonMark)
    {

        Storage::disk('local')->delete(str_replace('/storage','/public',$cartonMark->cm_image_path));
        $cartonMark->delete();

        $carton_marks = CartonMark::orderBy('id','DESC')->paginate(10);

        return view('carton-mark.index', compact('carton_marks'))->with('success','Delete Successfully!!!');
    }

    public function validateRequest(){
        return request()->validate([
            'cm_customer' => 'required|unique:carton_marks,cm_customer',
            'file' => 'required',
        ]);
    }
}
