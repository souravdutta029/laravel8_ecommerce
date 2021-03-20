@extends('admin/layout');

@section('page_title', 'Coupon')
@section('coupon_select', 'active')

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
    <h1>Coupon</h1>
    <a href="{{url('admin/coupon/manage_coupon')}}">
        <button type="button" class="btn btn-primary mt-3">
            <i class="fas fa-plus-square"></i>&nbsp; Add Coupon
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
                            <th>TITLE</th>
                            <th>CODE</th>
                            <th>VALUE</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $list)
                            <tr>
                                <td>{{$list ->id}}</td>
                                <td>{{$list ->title}}</td>
                                <td>{{$list ->code}}</td>
                                <td>{{$list ->value}}</td>
                                <td>
                                    <a href="{{url('admin/coupon/manage_coupon/')}}/{{$list ->id}}">
                                        <button class="btn btn-info" type="submit">
                                            Edit
                                        </button>
                                    </a>
                                    @if ($list ->status == 1)
                                        <a href="{{url('admin/coupon/status/0')}}/{{$list ->id}}">
                                            <button class="btn btn-success" type="submit">
                                                Active
                                            </button>
                                        </a>
                                    @else
                                        <a href="{{url('admin/coupon/status/1')}}/{{$list ->id}}">
                                            <button class="btn btn-warning" type="submit">
                                                Deactive
                                            </button>
                                        </a>
                                    @endif
                                    <a href="{{url('admin/coupon/delete/')}}/{{$list ->id}}">
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
