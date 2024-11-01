@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="mt-2">Carton Marks</h5>

                        <div>

                            <a href="{{route('carton-marks.create')}}"
                               class="btn btn-outline-primary">
                                <i class="fa fa-upload" aria-hidden="true"></i>
                                Carton Mark</a>

                            <a href="{{url()->previous()}}"
                               class="btn btn-outline-secondary">
                                <i class="fa fa-chevron-left" aria-hidden="true"></i>
                                Back</a>

                        </div>

                    </div>

                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">   {{ session('success') }}</div>
                        @endif
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th width="5%" scope="col">ID</th>
                                <th width="15%" scope="col">Customer</th>
                                <th width="40%" scope="col">Image</th>
                                <th width="15%" scope="col">Create By</th>
                                <th width="15%" scope="col">Updated At</th>
                                <th width="10%" scope="col">Option</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($carton_marks as $carton_mark)
                                <tr>
                                    <th scope="row">{{$carton_mark->id}}</th>
                                    <td>{{$carton_mark->cm_customer}}</td>
                                    <td>
                                        <img
                                            src="{{asset($carton_mark->cm_image_path)}}"
                                            class="img-fluid" alt="">
                                    </td>
                                    <td>{{$carton_mark->user->name}}</td>
                                    <td>{{$carton_mark->updated_at}}</td>
                                    <td>
                                        <form style="display:inline;padding: 0;" action="{{route('carton-marks.destroy', $carton_mark->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-outline-secondary"
                                                    onclick="return confirm('Delete {{$carton_mark->cm_customer}} Carton Mark ?')" >
                                                <i class="fa fa-trash" aria-hidden="true"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <h4 class="text-danger">No Record</h4>
                            @endforelse

                            </tbody>
                        </table>

                        <div class="row">
                            <div class="col-12 d-flex justify-content-center ">
                                {{$carton_marks->withQueryString()->onEachSide(2)->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
