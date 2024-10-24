@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="mt-2">Style Create</h5>

                        <div>

                            <a href="#"
                               class="btn btn-outline-primary">
                                <i class="fa fa-download" aria-hidden="true"></i>
                                Sample</a>
                            <a href="{{url()->previous()}}"
                               class="btn btn-outline-secondary">
                                <i class="fa fa-chevron-left" aria-hidden="true"></i>
                                Back</a>

                        </div>

                    </div>

                    <div class="card-body">

                        <form  action="{{route('styles.import')}}" method="post" enctype="multipart/form-data">
                            @csrf

                                    <div class="form-group ">
                                        <label for="pl_input_file">Please choose Upload Style File</label>
                                        <input type="file" class="form-control-file" name="file">
                                    </div>

                                <button type="submit" class="btn btn-primary"><i class="fa fa-upload" aria-hidden="true"></i> Upload</button>

                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
