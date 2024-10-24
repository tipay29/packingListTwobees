@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="mt-2">Style</h5>

                        <div>

                            <a href="{{route('styles.create')}}"
                               class="btn btn-outline-primary">
                                <i class="fa fa-upload" aria-hidden="true"></i>
                                MCQ</a>

                            <a href="{{url()->previous()}}"
                               class="btn btn-outline-secondary">
                                <i class="fa fa-chevron-left" aria-hidden="true"></i>
                                Back</a>

                        </div>

                    </div>

                    <div class="card-body">




                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
