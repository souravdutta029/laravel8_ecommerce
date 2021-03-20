@extends('front/layout');
@section('page_title', 'Cart Page')
@section('container')
<!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   {{-- <img src="img/fashion/fashion-header-bg-8.jpg" alt="fashion img"> --}}
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">

      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

 <!-- Cart view section -->
 <section id="cart-view">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
           <div class="cart-view-table">
             <form action="">
                @if (isset($list[0]))
               <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th></th>
                        <th></th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($list as $data)
                          <tr id="cart_box_{{$data ->attr_id}}">
                            <td><a class="remove" href="javascript:void(0)" onclick="deleteCartProduct('{{$data ->pid}}','{{$data ->size}}','{{$data ->color}}','{{$data ->attr_id}}')"><fa class="fa fa-close"></fa></a></td>
                            <td><a href="{{url('product/'.$data ->slug)}}"><img src="{{asset('storage/media/'.$data ->image)}}" alt="img"></a></td>
                            <td>
                                <a class="aa-cart-title" href="{{url('product/'.$data ->slug)}}">{{$data ->name}}
                                </a>
                                @if ($data ->size != '')
                                    <br>Size: {{$data ->size}}
                                @endif
                                @if ($data ->color != '')
                                    <br>Color: {{$data ->color}}
                                @endif
                            </td>
                            <td>Rs {{$data ->price}}</td>
                            <td><input id="qty{{$data ->attr_id}}" class="aa-cart-quantity" type="number" value="{{$data ->qty}}" onchange="updateQty('{{$data ->pid}}','{{$data ->size}}','{{$data ->color}}','{{$data ->attr_id}}','{{$data ->price}}')"></td>
                            <td id="total_price_{{$data ->attr_id}}">Rs {{$data ->price*$data ->qty}}</td>
                        </tr>
                      @endforeach
                      <tr>
                        <td colspan="6" class="aa-cart-view-bottom">
                          <div class="aa-cart-coupon">
                            <input class="aa-coupon-code" type="text" placeholder="Coupon">
                            <input class="aa-cart-view-btn" type="submit" value="Apply Coupon">
                          </div>
                          <input class="aa-cart-view-btn" type="button" value="Checkout">
                        </td>
                      </tr>
                      </tbody>
                  </table>
                </div>
                @else
                    <h3>Cart Empty</h3>
                @endif
             </form>
             <!-- Cart Total view -->
             {{-- <div class="cart-view-total">
               <h4>Cart Totals</h4>
               <table class="aa-totals-table">
                 <tbody>
                   <tr>
                     <th>Subtotal</th>
                     <td>$450</td>
                   </tr>
                   <tr>
                     <th>Total</th>
                     <td>$450</td>
                   </tr>
                 </tbody>
               </table>
               <a href="#" class="aa-cart-view-btn">Proced to Checkout</a>
             </div> --}}
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
