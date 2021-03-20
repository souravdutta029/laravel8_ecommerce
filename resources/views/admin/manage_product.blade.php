@extends('admin/layout');

@section('page_title', 'Manage Product')
@section('product_select', 'active')

@section('container')

    @if($id>0)
        @php
            $image_required="";
        @endphp
    @else
        @php
            $image_required="required";
        @endphp
    @endif

    <h1>Manage Product</h1>
    @if (session()->has('sku_error') != '')
        <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
            {{session('sku_error')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    @endif
    @error('attr_image.*')
        <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
            {{$message}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    @enderror

    @error('images.*')
        <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
            {{$message}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    @enderror
    <a href="{{url('admin/product')}}">
        <button type="button" class="btn btn-primary mt-3">
            <i class="fas fa-backward"></i>&nbsp; Back
        </button>
    </a>
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
    <div class="row m-t-30">
        <div class="col-md-12">
            <form action="{{route('product.manage_product_process')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header text-uppercase">Add Product</div>
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="name" class="control-label mb-1">Product Name</label>
                                            <input id="name" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$name}}" required>
                                            @error('name')
                                            <div class="alert alert-danger" role="alert">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="slug" class="control-label mb-1">Product Slug</label>
                                            <input id="slug" name="slug" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$slug}}" required>
                                            @error('slug')
                                            <div class="alert alert-danger" role="alert">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="image" class="control-label mb-1">Product Image</label>
                                    <input id="image" name="image" type="file" class="form-control" aria-required="true" aria-invalid="false" {{$image_required}}>
                                    @error('image')
                                        <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                        </div>
                                    @enderror
                                    @if ($image != '')
                                        <a href="{{asset('storage/media/'.$image)}}" target="_blank"><img width="100px" src="{{asset('storage/media/'.$image)}}" alt=""></a>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="category_id" class="control-label mb-1">Category</label>
                                            <select id="category_id" name="category_id" class="form-control" aria-required="true" aria-invalid="false" required>
                                                <option value="">Select Category</option>
                                                @foreach ($category as $list)
                                                    @if ($category_id == $list ->id)
                                                        <option selected value="{{$list ->id}}">{{$list ->category_name}}</option>
                                                    @else
                                                        <option value="{{$list ->id}}">{{$list ->category_name}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    <div class="col-md-4">
                                        <label for="brand" class="control-label mb-1">Brand</label>
                                        <select id="brand" name="brand" class="form-control" aria-required="true" aria-invalid="false" required>
                                            <option value="">Select Brand</option>
                                            @foreach ($brands as $list)
                                                @if ($brand == $list ->id)
                                                    <option selected value="{{$list ->id}}">{{$list ->name}}</option>
                                                @else
                                                    <option value="{{$list ->id}}">{{$list ->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="model" class="control-label mb-1">Model</label>
                                        <input id="model" name="model" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$model}}" required>
                                    </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="short_desc" class="control-label mb-1">Short Description</label>
                                    <textarea id="short_desc" name="short_desc" type="text" class="form-control" aria-required="true" aria-invalid="false" required >{{$short_desc}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="desc" class="control-label mb-1">Description</label>
                                    <textarea id="desc" name="desc" type="text" class="form-control" aria-required="true" aria-invalid="false" required >{{$desc}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="keywords" class="control-label mb-1">Keywords</label>
                                    <textarea id="keywords" name="keywords" type="text" class="form-control" aria-required="true" aria-invalid="false" required >{{$keywords}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="technical_specification" class="control-label mb-1">Technical Specification</label>
                                    <textarea id="technical_specification" name="technical_specification" type="text" class="form-control" aria-required="true" aria-invalid="false" required >{{$technical_specification}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="uses" class="control-label mb-1">Uses</label>
                                    <textarea id="uses" name="uses" type="text" class="form-control" aria-required="true" aria-invalid="false" required >{{$uses}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="warranty" class="control-label mb-1">Warranty</label>
                                    <textarea id="warranty" name="warranty" type="text" class="form-control" aria-required="true" aria-invalid="false" required >{{$warranty}}</textarea>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <label for="lead_time" class="control-label mb-1">Lead Time</label>
                                            <input id="lead_time" name="lead_time" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$lead_time}}">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="tax_id" class="control-label mb-1"> Tax</label>
                                            <select id="tax_id" name="tax_id" class="form-control" required>
                                                <option value="">Select Tax</option>
                                                @foreach($taxes as $list)
                                                @if($tax_id==$list ->id)
                                                    <option selected value="{{$list ->id}}">{{$list->tax_desc}}
                                                    </option>
                                                @else
                                                    <option value="{{$list->id}}">{{$list->tax_desc}}
                                                    </option>
                                                @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="is_promo" class="control-label mb-1">Is Promotional</label>
                                            <select id="is_promo" name="is_promo" class="form-control" aria-required="true" aria-invalid="false" required>
                                                @if ($is_promo == '1')
                                                    <option value="1" selected>Yes</option>
                                                    <option value="0">No</option>
                                                @else
                                                    <option value="1">Yes</option>
                                                    <option value="0" selected>No</option>
                                                @endif
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="is_featured" class="control-label mb-1">Is Featured</label>
                                            <select id="is_featured" name="is_featured" class="form-control" aria-required="true" aria-invalid="false" required>
                                                @if ($is_featured == '1')
                                                    <option value="1" selected>Yes</option>
                                                    <option value="0">No</option>
                                                @else
                                                    <option value="1">Yes</option>
                                                    <option value="0" selected>No</option>
                                                @endif
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="is_discounted" class="control-label mb-1">Is Discounted</label>
                                            <select id="is_discounted" name="is_discounted" class="form-control" aria-required="true" aria-invalid="false" required>
                                                @if ($is_discounted == '1')
                                                    <option value="1" selected>Yes</option>
                                                    <option value="0">No</option>
                                                @else
                                                    <option value="1">Yes</option>
                                                    <option value="0" selected>No</option>
                                                @endif
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="is_trending" class="control-label mb-1">Is Trending</label>
                                            <select id="is_trending" name="is_trending" class="form-control" aria-required="true" aria-invalid="false" required>
                                                @if ($is_trending == '1')
                                                    <option value="1" selected>Yes</option>
                                                    <option value="0">No</option>
                                                @else
                                                    <option value="1">Yes</option>
                                                    <option value="0" selected>No</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Multiple Product Images --}}

                    <h2 class="mb-2">Product Images</h2>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="row" id="product_images_box">
                                        @php
                                            $loop_count_num = 1;
                                        @endphp
                                        @foreach ($productImagesArr as $key =>$val)
                                        @php
                                            $loop_count_prev = $loop_count_num;
                                            $pIArr = (array)$val;
                                        @endphp

                                        <input id="piid" name="piid[]" type="hidden" value="{{$pIArr['id']}}">
                                        <div class="col-md-4 product_images_{{$loop_count_num++}}">
                                            <label for="images" class="control-label mb-1">Image</label>
                                            <input id="images" name="images[]" type="file" class="form-control" aria-required="true" aria-invalid="false">
                                            @if ($pIArr['images'] != '')
                                              <a href="{{asset('storage/media/'.$pIArr['images'])}}" target="_blank"><img width="100px" src="{{asset('storage/media/'.$pIArr['images'])}}" alt=""></a>
                                            @endif
                                        </div>
                                        <div class="col-md-2 mt-1">
                                            <label for="images" class="control-label mb-2">&nbsp;&nbsp;&nbsp;</label>
                                            @if ($loop_count_num == 2)
                                                <button type="button" class="btn btn-success" onclick="add_more_image()">
                                                <i class="fas fa-plus-square"></i>&nbsp; Add More</button>
                                            @else
                                                <a href="{{url('admin/product/product_images_delete')}}/{{$pIArr['id']}}/{{$id}}"><button type="button" class="btn btn-danger ">
                                                <i class="fas fa-minus-square"></i>&nbsp; Remove</button></a>
                                            @endif
                                        </div>
                                         @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Multiple Product Images Ends--}}

                    <h2 class="mb-2">Product Attributes</h2>
                    <div class="col-lg-12" id="product_attr_box">
                        @php
                            $loop_count_num = 1;
                        @endphp
                        @foreach ($productAttrArr as $key =>$val)
                        @php
                            $loop_count_prev = $loop_count_num;
                            $pAArr = (array)$val;
                        @endphp

                        <input id="paid" name="paid[]" type="hidden" value="{{$pAArr['id']}}">

                        <div class="card" id="product_attr_{{$loop_count_num++}}">
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="sku" class="control-label mb-1">SKU</label>
                                            <input id="sku" name="sku[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required value="{{$pAArr['sku']}}">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="mrp" class="control-label mb-1">MRP</label>
                                            <input id="mrp" name="mrp[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required value="{{$pAArr['mrp']}}">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="price" class="control-label mb-1">Price</label>
                                            <input id="price" name="price[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required value="{{$pAArr['price']}}">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="size_id" class="control-label mb-1">Size</label>
                                            <select id="size_id" name="size_id[]" class="form-control" aria-required="true" aria-invalid="false">
                                                <option value="">Select</option>
                                                @foreach ($sizes as $list)
                                                    @if($pAArr['size_id'] == $list ->id)
                                                    <option value="{{$list ->id}}" selected>{{$list ->size}}</option>
                                                    @else
                                                    <option value="{{$list ->id}}">{{$list ->size}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3 mt-1">
                                            <label for="color_id" class="control-label mb-1">Color</label>
                                            <select id="color_id" name="color_id[]" class="form-control" aria-required="true" aria-invalid="false">
                                                <option value="">Select</option>
                                                @foreach ($colors as $list)
                                                    @if($pAArr['color_id'] == $list ->id)
                                                    <option value="{{$list ->id}}" selected>{{$list ->color}}</option>
                                                    @else
                                                    <option value="{{$list ->id}}">{{$list ->color}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-2 mt-1">
                                            <label for="qty" class="control-label mb-1">Qty</label>
                                            <input id="qty" name="qty[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required value="{{$pAArr['qty']}}">
                                        </div>
                                        <div class="col-md-4 mt-1">
                                            <label for="attr_image" class="control-label mb-1">Attr Image</label>
                                            <input id="attr_image" name="attr_image[]" type="file" class="form-control" aria-required="true" aria-invalid="false">
                                            @if ($pAArr['attr_image'] != '')
                                              <a href="{{asset('storage/media/'.$pAArr['attr_image'])}}" target="_blank"><img width="100px" src="{{asset('storage/media/'.$pAArr['attr_image'])}}" alt=""></a>
                                            @endif
                                        </div>
                                        <div class="col-md-2 mt-1">
                                            <label for="attr_image" class="control-label mb-2">&nbsp;&nbsp;&nbsp;</label>
                                            @if ($loop_count_num == 2)
                                                <button type="button" class="btn btn-success" onclick="add_more()">
                                                <i class="fas fa-plus-square"></i>&nbsp; Add More</button>
                                            @else
                                                <a href="{{url('admin/product/product_attr_delete')}}/{{$pAArr['id']}}/{{$id}}"><button type="button" class="btn btn-danger">
                                                <i class="fas fa-minus-square"></i>&nbsp; Remove</button></a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
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
    <script>
        var loop_count = 1;
        function add_more(){
            loop_count++;
            var html = '<input id="paid" name="paid[]" type="hidden"><div class="card" id="product_attr_'+loop_count+'"><div class="card-body"><div class="form-group"><div class="row">';

            html += '<div class="col-md-3"><label for="sku" class="control-label mb-1">SKU</label><input id="sku" name="sku[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required></div>';

            html += '<div class="col-md-3"><label for="mrp" class="control-label mb-1">MRP</label><input id="mrp" name="mrp[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required></div>';

            html += '<div class="col-md-3"><label for="price" class="control-label mb-1">Price</label><input id="price" name="price[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required></div>';

            html += '<div class="col-md-3"><label for="size_id" class="control-label mb-1">Size</label><select id="size_id" name="size_id[]" class="form-control" aria-required="true" aria-invalid="false"><option value="">Select</option>@foreach ($sizes as $list)<option value="{{$list ->id}}">{{$list ->size}}</option>@endforeach</select></div>';

            html += '<div class="col-md-3 mt-1"><label for="color_id" class="control-label mb-1">Color</label><select id="color_id" name="color_id[]" class="form-control" aria-required="true" aria-invalid="false"><option value="">Select</option>@foreach ($colors as $list)<option value="{{$list ->id}}">{{$list ->color}}</option>@endforeach</select></div>';

            html += '<div class="col-md-2 mt-1"><label for="qty" class="control-label mb-1">Qty</label><input id="qty" name="qty[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required></div>';

            html += '<div class="col-md-4 mt-1"><label for="attr_image" class="control-label mb-1">Attr Image</label><input id="attr_image" name="attr_image[]" type="file" class="form-control" aria-required="true" aria-invalid="false"></div>';

            html += '<div class="col-md-2 mt-1"><label for="attr_image" class="control-label mb-2">&nbsp;&nbsp;&nbsp;</label><button type="button" class="btn btn-danger" onclick=remove_more("'+loop_count+'")><i class="fas fa-minus-square"></i>&nbsp;&nbsp; Remove</button></div>';

            html += '</div></div></div></div>'

            jQuery('#product_attr_box').append(html);
        }

        function remove_more(loop_count){
            jQuery('#product_attr_'+loop_count).remove();
        }

        var loop_image_count = 1;
        function add_more_image(){
            loop_image_count++;
            var html = '<input id="piid" name="piid[]" type="hidden"><div class="col-md-4 product_images_'+loop_image_count+'"><label for="images" class="control-label mb-1">Image</label><input id="images" name="images[]" type="file" class="form-control" aria-required="true" aria-invalid="false"></div>';

            html += '<div class="col-md-2 product_images_'+loop_image_count+'"><label for="images" class="control-label mb-2">&nbsp;&nbsp;&nbsp;</label><button type="button" class="btn btn-danger" onclick=remove_more_image("'+loop_image_count+'")><i class="fas fa-minus-square"></i>&nbsp;&nbsp; Remove</button></div>';

            jQuery('#product_images_box').append(html);
        }

        function remove_more_image(loop_image_count){
            jQuery('.product_images_'+loop_image_count).remove();
        }

        CKEDITOR.replace('short_desc');
        CKEDITOR.replace('desc');
        CKEDITOR.replace('technical_specification');
    </script>
@endsection
