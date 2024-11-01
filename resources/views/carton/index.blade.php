@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="mt-2">Cartons</h5>

                        <div>

                            <a href="{{route('cartons.create')}}"
                               class="btn btn-outline-primary">
                                <i class="fa fa-upload" aria-hidden="true"></i>
                                Carton</a>

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
                                <th width="10%" scope="col">Number</th>
                                <th width="30%" scope="col">Measurement(CM)</th>
                                <th width="20%" scope="col">Weight</th>
                                <th width="20%" scope="col">Create By</th>
                                <th width="20%" scope="col">Option</th>
                            </tr>
                            </thead>
                            <tbody>

                            @forelse($cartons as $key => $carton)
                                <tr>
                                    <td scope="row">{{$key+1}}</td>
                                    <td>{{$carton->ctn_measurement}}</td>
                                    <td>{{$carton->ctn_weight}}</td>
                                    <td>{{$carton->user->name}}</td>
                                    <td>
                                        <a class="btn btn-outline-primary" href="{{route('cartons.edit',$carton->id)}}">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>
                                        <form style="display:inline;padding: 0;" action="{{route('cartons.destroy', $carton->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-outline-secondary"
                                                    onclick="return confirm('Delete {{$carton->ctn_measurement}} Carton ?')" >
                                                <i class="fa fa-trash" aria-hidden="true"></i></button>
                                        </form>

                                    </td>
                                </tr>
                            @empty
                                <h4 class="text-danger">No Carton Record!</h4>
                            @endforelse


                            </tbody>
                        </table>

                        <div class="row">
                            <div class="col-12 d-flex justify-content-center ">
                                {{$cartons->withQueryString()->onEachSide(2)->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
