@extends('admin/layout');

@section('page_title', 'Color')
@section('color_select', 'active')

@section('container')
    <h1>Manage Color</h1>
    <a href="{{url('admin/color')}}">
        <button type="button" class="btn btn-primary mt-3">
            <i class="fas fa-backward"></i>&nbsp; Back
        </button>
    </a>
    <div class="row m-t-30">
        <div class="col-md-12">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header text-uppercase">Add Color</div>
                        <div class="card-body">
                            <form action="{{route('color.manage_color_process')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="color" class="control-label mb-1">Color</label>
                                    <input id="color" name="color" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$color}}" required>
                                    @error('color')
                                        <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                <div>
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block text-uppercase">
                                        Submit
                                    </button>
                                    <input type="hidden" name="id" value="{{$id}}">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
