@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="mt-2">Packing Lists</h5>

                        <div>

                            <a href="{{route('packing-lists.create')}}"
                               class="btn btn-outline-primary">
                                <i class="fa fa-plus-square" aria-hidden="true"></i>
                                Create</a>

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
                                <th scope="col">ID</th>
                                <th scope="col">Buy Year</th>
                                <th scope="col">Buy Month</th>
                                <th scope="col">Season</th>
                                <th scope="col">Create By</th>
                                <th scope="col">Option</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($batches as $batch)
                            <tr>
                                <th scope="row">{{$batch->id}}</th>
                                <td>{{$batch->buy_year}}</td>
                                <td>{{$batch->buy_month}}</td>
                                <td>{{$batch->season}}</td>
                                <td>{{$batch->user->name}}</td>
                                <td>
                                    <a class="btn btn-outline-primary" href="{{route('packing-lists.show-batch',$batch->id)}}">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                                    <form style="display:inline;padding: 0;" action="{{route('packing-lists.destroy-per-batch', $batch)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-outline-secondary"
                                                onclick="return confirm('Delete Batch ID#{{$batch->id}}  ?')" >
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
                                {{$batches->withQueryString()->onEachSide(2)->links()}}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
