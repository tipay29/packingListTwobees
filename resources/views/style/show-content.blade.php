@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="mt-2">Style Basis {{$style_code}}</h5>

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
                        @if(!empty($success))
                            <div class="alert alert-success"> {{ $success }}</div>
                        @endif
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">Size</th>
                                <th scope="col">Weight</th>
                                <th scope="col">Carton (CM)</th>
                                <th scope="col">MCQ</th>
                                <th scope="col">Option</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($contents as $content)
                                <tr>
                                    <td>{{$content->style_size}}</td>
                                    <td>{{$content->style_weight}}</td>
                                    <td>{{$content->carton_measurement}}</td>
                                    <td>{{$content->mcq}}</td>
                                    <td>

                                        <form style="display:inline;padding: 0;" action="{{route('styles.destroy-per-content',$content->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-outline-secondary"
                                                    onclick="return confirm('Delete Content?')" >
                                                <i class="fa fa-trash" aria-hidden="true"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <h4 class="text-danger">No Record</h4>
                            @endforelse

                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
