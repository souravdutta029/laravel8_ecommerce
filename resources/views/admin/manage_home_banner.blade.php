@extends('admin/layout');

@section('page_title', 'Manage Home Banner')
@section('home_banner_select', 'active')


@section('container')
    <h1>Manage Home Banner</h1>
    <a href="{{url('admin/home_banner')}}">
        <button type="button" class="btn btn-primary mt-3">
            <i class="fas fa-backward"></i>&nbsp; Back
        </button>
    </a>
    <div class="row m-t-30">
        <div class="col-md-12">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header text-uppercase">Add Banner to Home</div>
                        <div class="card-body">
                            <form action="{{route('home_banner.manage_home_banner_process')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="btn_text" class="control-label mb-1">Button Text</label>
                                            <input id="btn_text" name="btn_text" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$btn_text}}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="btn_link" class="control-label mb-1">Button Link</label>
                                            <input id="btn_link" name="btn_link" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$btn_link}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="image" class="control-label mb-1">Banner Image</label>
                                    <input id="image" name="image" type="file" class="form-control" aria-required="true" aria-invalid="false">
                                    @error('image')
                                        <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                        </div>
                                    @enderror
                                    @if ($image != '')
                                        <img width="100px" src="{{asset('storage/media/banner/'.$image)}}" alt="">
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
