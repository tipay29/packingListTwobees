<?php

namespace App\Http\Controllers;

use App\Models\Carton;

class CartonController extends Controller
{

    public function index()
    {
        $cartons = Carton::paginate(10);

        return view('carton.index', compact('cartons'));
    }

    public function create()
    {
        return view('carton.create');
    }

    public function store()
    {
        $data = [
            'ctn_measurement' => request()->ctn_measurement,
            'ctn_weight' => request()->ctn_weight,
            'user_id' => auth()->user()->id,
        ];

        Carton::create($data);

        return redirect(route('cartons.index'))->with('success','Added Successfully!!!');
    }

    public function edit(Carton $carton)
    {
        return view('carton.edit',compact('carton'));
    }

    public function update(Carton $carton)
    {
        $carton->update([
            'ctn_measurement' => request()->ctn_measurement,
            'ctn_weight' => request()->ctn_weight,
        ]);

        return redirect(route('cartons.index'))->with('success','Update Successfully!!!');
    }

    public function destroy(Carton $carton)
    {
        $carton->delete();

        return redirect(route('cartons.index'))->with('success','Destroy Successfully!!!');
    }
}
