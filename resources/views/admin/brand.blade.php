@extends('admin/layout');

@section('page_title', 'Brand')
@section('brand_select', 'active')

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
    <h1>Brand</h1>
    <a href="{{url('admin/brand/manage_brand')}}">
        <button type="button" class="btn btn-primary mt-3">
            <i class="fas fa-plus-square"></i>&nbsp; Add Brand
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
                            <th>BRAND NAME</th>
                            <th>BRAND IMAGE</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $list)
                            <tr>
                                <td>{{$list ->id}}</td>
                                <td>{{$list ->name}}</td>
                                <td>
                                    @if ($list ->image != '')
                                        <img width="100px" src="{{asset('storage/media/brand/'.$list ->image)}}" alt="{{$list ->name}}">
                                    @endif
                                </td>
                                <td>
                                    <a href="{{url('admin/brand/manage_brand/')}}/{{$list ->id}}">
                                        <button class="btn btn-info" type="submit">
                                            Edit
                                        </button>
                                    </a>
                                    @if ($list ->status == 1)
                                        <a href="{{url('admin/brand/status/0')}}/{{$list ->id}}">
                                            <button class="btn btn-success" type="submit">
                                                Active
                                            </button>
                                        </a>
                                    @elseif ($list ->status == 0)
                                        <a href="{{url('admin/brand/status/1')}}/{{$list ->id}}">
                                            <button class="btn btn-warning" type="submit">
                                                Deactivate
                                            </button>
                                        </a>
                                    @endif
                                    <a href="{{url('admin/brand/delete/')}}/{{$list ->id}}">
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
