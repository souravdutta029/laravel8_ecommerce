@extends('admin/layout');

@section('page_title', 'Brand')
@section('brand_select', 'active')

{{-- @if($id>0)
    @php
        $image_required="";
    @endphp
@else
    @php
        $image_required="required";
    @endphp
@endif --}}

@section('container')
    <h1>Manage Brand</h1>
    @error('image.*')
        <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
            {{$message}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    @enderror
    <a href="{{url('admin/brand')}}">
        <button type="button" class="btn btn-primary mt-3">
            <i class="fas fa-backward"></i>&nbsp; Back
        </button>
    </a>
    <div class="row m-t-30">
        <div class="col-md-12">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header text-uppercase">Add Brand</div>
                        <div class="card-body">
                            <form action="{{route('brand.manage_brand_process')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <label for="brand" class="control-label mb-1">Brand Name</label>
                                            <input id="brand" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$name}}" required>
                                            @error('name')
                                                <div class="alert alert-danger" role="alert">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-3">
                                            <label for="in_home" class="control-label mb-1">Show in Home Page</label>
                                            <input id="in_home" name="in_home" type="checkbox" {{$in_home_selected}}>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="image" class="control-label mb-1">Brand Image</label>
                                    <input id="image" name="image" type="file" class="form-control" aria-required="true" aria-invalid="false">
                                    @error('image')
                                        <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                        </div>
                                    @enderror
                                    @if ($image != '')
                                        <img width="100px" src="{{asset('storage/media/brand/'.$image)}}" alt="{{$name}}">
                                    @endif
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
