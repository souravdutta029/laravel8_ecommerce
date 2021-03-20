@extends('front/layout')
@section('page_title', 'Search')
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
        <div class="col-lg-12 col-md-12 col-sm-8">
            <div class="aa-product-catg-content">
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
@endsection
