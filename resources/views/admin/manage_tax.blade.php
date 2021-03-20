@extends('admin/layout');

@section('page_title', 'Tax')
@section('tax_select', 'active')

@section('container')
    <h1>Manage Tax</h1>
    <a href="{{url('admin/tax')}}">
        <button type="button" class="btn btn-primary mt-3">
            <i class="fas fa-backward"></i>&nbsp; Back
        </button>
    </a>
    <div class="row m-t-30">
        <div class="col-md-12">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header text-uppercase">Add Tax</div>
                        <div class="card-body">
                            <form action="{{route('tax.manage_tax_process')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="tax_desc" class="control-label mb-1">Tax Description</label>
                                    <input id="tax_desc" name="tax_desc" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$tax_desc}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="tax_value" class="control-label mb-1">Tax Value</label>
                                    <input id="tax_value" name="tax_value" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$tax_value}}" required>
                                    @error('tax_value')
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
