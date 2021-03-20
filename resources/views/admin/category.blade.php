@extends('admin/layout');

@section('page_title', 'Category')
@section('category_select', 'active')

@section('container')
    @if (session('message') != '')
        <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
            <span class="badge badge-pill badge-success">Success</span>
            {{session('message')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    @endif
    <h1>Category</h1>
    <a href="{{url('admin/category/manage_category')}}">
        <button type="button" class="btn btn-primary mt-3">
            <i class="fas fa-plus-square"></i>&nbsp; Add Category
        </button>
    </a>
    <div class="row m-t-30">
        <div class="col-md-12">
            <!-- DATA TABLE-->
            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>CATEGORY NAME</th>
                            <th>CATEGORY SLUG</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $list)
                            <tr>
                                <td>{{$list ->id}}</td>
                                <td>{{$list ->category_name}}</td>
                                <td>{{$list ->category_slug}}</td>
                                <td>
                                    <a href="{{url('admin/category/manage_category/')}}/{{$list ->id}}">
                                        <button class="btn btn-info" type="submit">
                                            Edit
                                        </button>
                                    </a>
                                    @if ($list ->status == 1)
                                        <a href="{{url('admin/category/status/0')}}/{{$list ->id}}">
                                            <button class="btn btn-success" type="submit">
                                                Active
                                            </button>
                                        </a>
                                    @elseif ($list ->status == 0)
                                        <a href="{{url('admin/category/status/1')}}/{{$list ->id}}">
                                            <button class="btn btn-warning" type="submit">
                                                Deactivate
                                            </button>
                                        </a>
                                    @endif
                                    <a href="{{url('admin/category/delete/')}}/{{$list ->id}}">
                                        <button class="btn btn-danger" type="submit">
                                            Delete
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- END DATA TABLE-->
        </div>
    </div>
@endsection
