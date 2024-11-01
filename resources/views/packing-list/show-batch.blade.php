@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="mt-2">Packing List Batch {{$batch->id}}</h5>

                        <div>

                            <a href="{{route('packing-lists.create')}}"
                               class="btn btn-outline-primary">
                                <i class="fa fa-plus-square" aria-hidden="true"></i>
                                Create</a>

                            <a href="{{route('packing-lists.index')}}"
                               class="btn btn-outline-secondary">
                                <i class="fa fa-chevron-left" aria-hidden="true"></i>
                                Back</a>

                        </div>

                    </div>

                    <div class="card-body">

                        @if (session('success'))
                            <div class="alert alert-success">   {{ session('success') }}</div>
                        @endif

                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th width="20%" scope="col">Number</th>
                                <th width="60%" scope="col">Factory PO</th>
                                <th width="20%" scope="col">Option</th>

                            </tr>
                            </thead>
                            <tbody>
                                @foreach($factory_pos as $key => $factory_po)
                                    <tr>
                                        <th scope="row">{{$key+1}}</th>
                                        <td>{{$factory_po}}</td>
                                        <td>

                                            <a class="btn btn-outline-primary" href="{{route('packing-lists.export',[$batch,$factory_po])}}">
                                                <i class="fa fa-download" aria-hidden="true"></i>
                                            </a>
                                            <form style="display:inline;padding: 0;" action="{{route('packing-lists.destroy-per-po', [$batch,$factory_po])}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-outline-secondary"
                                                        onclick="return confirm('Delete Factory PO#{{$factory_po}}  ?')" >
                                                    <i class="fa fa-trash" aria-hidden="true"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
