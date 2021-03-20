@extends('front/layout');
@section('page_title', 'Registration')
@section('container')
 <!-- Cart view section -->
 <section id="aa-myaccount">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="aa-myaccount-area">
            <div class="row">
              <div class="col-md-3"></div>
              <div class="col-md-6">
                <div class="aa-myaccount-register">
                 <h4>Register</h4>
                 <form action="" class="aa-login-form" id="frmRegistration">
                     @csrf
                    <div>
                        <label for="">Name<span>*</span></label>
                        <input type="text" placeholder="Name" name="name" >
                        <span id="name_error" class="field_error"></span>
                    </div>

                    <div>
                        <label for="">Email<span>*</span></label>
                        <input type="email" placeholder="Email" name="email" required>
                        <span id="email_error" class="field_error"></span>
                    </div>

                    <div>
                        <label for="">Mobile<span>*</span></label>
                        <input type="text" placeholder="Mobile" name="mobile" required>
                        <span id="mobile_error" class="field_error"></span>
                    </div>

                    <div>
                        <label for="">Password<span>*</span></label>
                        <input type="password" placeholder="Password" name="password">
                        <span id="password_error" class="field_error"></span>
                    </div>

                    <button type="submit" class="aa-browse-btn" id="btnRegistration">Register</button>
                  </form>
                </div>
                <div id="thank_you_msg" class="field_success"></div>
              </div>
              <div class="col-md-3"></div>
            </div>
         </div>
       </div>
     </div>
   </div>
 </section>
@endsection
