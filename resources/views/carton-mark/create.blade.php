@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="mt-2">Carton Mark Create</h5>

                        <div>

                            <a href="{{url()->previous()}}"
                               class="btn btn-outline-secondary">
                                <i class="fa fa-chevron-left" aria-hidden="true"></i>
                                Back</a>

                        </div>

                    </div>

                    <div class="card-body">

                        <form  action="{{route('carton-marks.store')}}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="cm_customer">Customer</label>
                                <input value="{{old('cm_customer')}}" type="text" class="form-control" name="cm_customer" id="cm_customer" placeholder="Enter Customer">
                            </div>
                            @error('cm_customer')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group ">
                                <label for="file">Please choose Carton Mark Image</label>
                                <input type="file" class="form-control-file" name="file">
                            </div>

                            @error('file')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <button type="submit" class="btn btn-primary"><i class="fa fa-upload" aria-hidden="true"></i> Submit</button>

                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
