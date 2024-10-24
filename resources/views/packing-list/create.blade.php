@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="mt-2">Packing Lists Create</h5>

                        <div>

                            <a href="{{route('styles.create')}}"
                               class="btn btn-outline-primary">
                                <i class="fa fa-upload" aria-hidden="true"></i>
                                MCQ</a>

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


                        <form  action="{{route('packing-lists.import')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label for="pl_input_file">Please choose Upload PL File</label>
                                        <input type="file" class="form-control-file" name="file">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="season">Season <small style="color:grey;">(optional)</small></label>
                                        <input type="text" class="form-control" id="season" name="season" placeholder="Season">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="buy_year">Buy Year <small style="color:grey;">(optional)</small></label>
                                        <input type="text" class="form-control" id="buy_year" name="buy_year" placeholder="Year">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="buy_month">Buy Month <small style="color:grey;">(optional)</small></label>
                                        <input type="text" class="form-control" id="buy_month" name="buy_month" placeholder="Month">
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" id="batch" name="batch" value="{{$last_batch}}">

                            <div class="d-flex justify-content-center" >
                                <button type="submit" class="btn btn-primary"><i class="fa fa-upload" aria-hidden="true"></i> Upload</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
