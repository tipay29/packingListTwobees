@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="mt-2">Carton Edit</h5>

                        <div>

                            <a href="{{url()->previous()}}"
                               class="btn btn-outline-secondary">
                                <i class="fa fa-chevron-left" aria-hidden="true"></i>
                                Back</a>

                        </div>

                    </div>

                    <div class="card-body">

                        <form  action="{{route('cartons.update',$carton->id)}}" method="post" enctype="multipart/form-data">
                            @csrf

                            @method('PATCH')

                            <div class="form-group">
                                <label for="ctn_measurement">Measurement</label>
                                <input value="{{old('ctn_measurement') ?? $carton->ctn_measurement }}" type="text" class="form-control" name="ctn_measurement"
                                       id="ctn_measurement" placeholder="Enter Measurement" required>
                            </div>
                            <div class="form-group">
                                <label for="ctn_weight">Weight</label>
                                <input value="{{old('ctn_weight') ?? $carton->ctn_weight }}" type="text" class="form-control" name="ctn_weight"
                                       id="ctn_weight" placeholder="Enter Weight" required>
                            </div>

                            <button type="submit" class="btn btn-primary"><i class="fa fa-upload" aria-hidden="true"></i> Submit</button>

                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
