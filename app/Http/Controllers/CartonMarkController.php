<?php

namespace App\Http\Controllers;

use App\Models\CartonMark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CartonMarkController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $carton_marks = CartonMark::paginate(10);

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

        return redirect(route('carton-marks.index'));

    }


    public function show(CartonMark $cartonMark)
    {
        //
    }

    public function edit(CartonMark $cartonMark)
    {
        //
    }

    public function update(Request $request, CartonMark $cartonMark)
    {
        //
    }

    public function destroy(CartonMark $cartonMark)
    {

        Storage::disk('local')->delete(str_replace('/storage','/public',$cartonMark->cm_image_path));
        $cartonMark->delete();

        return redirect()->back();
    }

    public function validateRequest(){
        return request()->validate([
            'cm_customer' => 'required|unique:carton_marks,cm_customer',
            'file' => 'required',
        ]);
    }
}
