@extends('front/layout');
@section('page_title', 'Category')
@section('container')
{{-- <section id="aa-catg-head-banner">
    <img src="img/fashion/fashion-header-bg-8.jpg" alt="fashion img">
    <div class="aa-catg-head-banner-area">
        <div class="container">
        <div class="aa-catg-head-banner-content">
            <h2>Fashion</h2>
            <ol class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li class="active">Women</li>
            </ol>
        </div>
        </div>
    </div>
</section> --}}

<section id="aa-product-category">
    <div class="container">
        <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
            <div class="aa-product-catg-content">
            <div class="aa-product-catg-head">
                <div class="aa-product-catg-head-left">
                <form action="" class="aa-sort-form">
                    <label for="">Sort by</label>
                    <select name="" onchange="sort_by()" id="sort_by_value">
                    <option value="" selected="Default">Default</option>
                    <option value="name">Name</option>
                    <option value="price_desc">Price(High - Low)</option>
                    <option value="price_asc">Price(Low - High)</option>
                    <option value="date">Date</option>
                    </select>
                </form>
                &nbsp;&nbsp;<strong style="color: red">{{strtoupper($sort_txt)}}</strong>
                </div>
                <div class="aa-product-catg-head-right">
                <a id="grid-catg" href="#"><span class="fa fa-th"></span></a>
                <a id="list-catg" href="#"><span class="fa fa-list"></span></a>
                </div>
            </div>
            <div class="aa-product-catg-body">
                <ul class="aa-product-catg">
                    @if(isset($product[0]))
                        @foreach ($product as $productArr)
                        <li>
                          <figure>
                            <a class="aa-product-img" href="{{url('product/'.$productArr ->slug)}}"><img src="{{asset('storage/media/'.$productArr ->image)}}" alt="{{$productArr ->name}}"></a>
                            <a class="aa-add-card-btn" href="javascript:void(0)" onclick="home_add_to_cart('{{$productArr ->id}}', '{{$product_attr[$productArr ->id][0]->size}}', '{{$product_attr[$productArr ->id][0]->color}}')"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                              <figcaption>
                              <h4 class="aa-product-title"><a href="{{url('product/'.$productArr ->slug)}}">{{$productArr ->name}}</a></h4>
                              <span class="aa-product-price">Rs {{$product_attr[$productArr ->id][0]->price}}</span><span class="aa-product-price"><del>Rs {{$product_attr[$productArr ->id][0]->mrp}}</del></span>
                            </figcaption>
                          </figure>
                        </li>
                        @endforeach
                        @else
                            <li>
                                <figure>
                                    No Products Found
                                </figure>
                            </li>
                        @endif
                </ul>
            </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
            <aside class="aa-sidebar">
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
                <h3>Category</h3>
                <ul class="aa-catg-nav">
                    @foreach ($categories_left as $list)
                        @if ($slug == $list ->category_slug)
                            <li><a href="{{url('category/'.$list ->category_slug)}}" class="left_cat_active">{{$list ->category_name}}</a></li>
                        @else
                            <li><a href="{{url('category/'.$list ->category_slug)}}">{{$list ->category_name}}</a></li>
                        @endif
                    @endforeach
                </ul>
            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
                <h3>Tags</h3>
                <div class="tag-cloud">
                <a href="#">Fashion</a>
                <a href="#">Ecommerce</a>
                <a href="#">Shop</a>
                <a href="#">Hand Bag</a>
                <a href="#">Laptop</a>
                <a href="#">Head Phone</a>
                <a href="#">Pen Drive</a>
                </div>
            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Shop By Price</h3>
              <!-- price range -->
              <div class="aa-sidebar-price-range">
               <form action="">
                  <div id="skipstep" class="noUi-target noUi-ltr noUi-horizontal noUi-background">
                  </div>
                  <span id="skip-value-lower" class="example-val">30.00</span>
                 <span id="skip-value-upper" class="example-val">100.00</span>
                 <button class="aa-filter-btn" type="button" onclick="sort_price_filter()">Filter</button>
               </form>
              </div>
            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
                <h3>Shop By Color</h3>
                <div class="aa-color-tag">
                @foreach ($colors as $list)
                    @if (in_array($list ->id, $colorFilterArr))
                        <a class="aa-color-{{strtolower($list ->color)}} active_color" href="javascript:void(0)" onclick="setColor('{{$list ->id}}', '1')"></a>
                    @else
                        <a class="aa-color-{{strtolower($list ->color)}}" href="javascript:void(0)" onclick="setColor('{{$list ->id}}', '0')"></a>
                    @endif
                @endforeach
                </div>
            </div>
            </aside>
        </div>

        </div>
    </div>
</section>
<input type="hidden" id="qty" value="1">
<form action="" id="frmAddToCart">
    @csrf
    <input type="hidden" name="color_id" id="color_id">
    <input type="hidden" name="size_id" id="size_id">
    <input type="hidden" name="pqty" id="pqty">
    <input type="hidden" name="product_id" id="product_id">
</form>

<form action="" id="categoryFilter">
    <input type="hidden" name="sort" id="sort" value="{{$sort}}">
    <input type="hidden" name="filter_price_start" id="filter_price_start" value="{{$filter_price_start}}">
    <input type="hidden" name="filter_price_end" id="filter_price_end" value="{{$filter_price_end}}">
    <input type="hidden" name="color_filter" id="color_filter" value="{{$color_filter}}">
</form>
@endsection
