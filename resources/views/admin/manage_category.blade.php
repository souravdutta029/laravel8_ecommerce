@extends('admin/layout');

@section('page_title', 'Manage Category')
@section('category_select', 'active')


@section('container')
    <h1>Manage Category</h1>
    <a href="{{url('admin/category')}}">
        <button type="button" class="btn btn-primary mt-3">
            <i class="fas fa-backward"></i>&nbsp; Back
        </button>
    </a>
    <div class="row m-t-30">
        <div class="col-md-12">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header text-uppercase">Add Category</div>
                        <div class="card-body">
                            <form action="{{route('category.manage_category_process')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="category_name" class="control-label mb-1">Category Name</label>
                                            <input id="category_name" name="category_name" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$category_name}}" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="parent_category_id" class="control-label mb-1">Parent Category</label>
                                            <select id="parent_category_id" name="parent_category_id" class="form-control" aria-required="true" aria-invalid="false" required>
                                                <option value="0">Select Category</option>
                                                @foreach ($category as $list)
                                                    @if ($parent_category_id == $list ->id)
                                                        <option selected value="{{$list ->id}}">{{$list ->category_name}}</option>
                                                    @else
                                                        <option value="{{$list ->id}}">{{$list ->category_name}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="category_slug" class="control-label mb-1">Category Slug</label>
                                            <input id="category_slug" name="category_slug" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$category_slug}}" required>
                                            @error('category_slug')
                                                <div class="alert alert-danger" role="alert">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="category_image" class="control-label mb-1">Category Image</label>
                                    <input id="category_image" name="category_image" type="file" class="form-control" aria-required="true" aria-invalid="false">
                                    @error('category_image')
                                        <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                        </div>
                                    @enderror
                                    @if ($category_image != '')
                                        <img width="100px" src="{{asset('storage/media/category/'.$category_image)}}" alt="">
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="in_home" class="control-label mb-1">Show in Home Page</label>
                                    <input id="in_home" name="in_home" type="checkbox" {{$in_home_selected}}>

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
