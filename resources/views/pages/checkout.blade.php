@extends('welcome')

@section('content')

<script src="https://js.stripe.com/v3/"></script>
<style>
    /**
 * The CSS shown here will not be introduced in the Quickstart guide, but shows
 * how you can use CSS to style your Element's container.
 */
.StripeElement {
  box-sizing: border-box;

  height: 40px;
  width: 100%;

  padding: 10px 12px;

  border: 1px solid transparent;
  border-radius: 4px;
  background-color: white;

  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
}

.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}

.StripeElement--invalid {
  border-color: #fa755a;
}

.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;}
</style>

@if(Cart::subtotal() == 0)
  <script>window.location = "/cart";</script>
@endif
<div class="checkout-area pt-50 pb-100">
     <div class="container">
     <h2 class="text-center text-uppercase font-weight-bold" style="color: #050035;">Shipping Info</h2><hr style="margin: 35px 0 !important;">
         <div class="row">
             <div class="col-lg-6 col-md-12 col-12">
                 <form id="addShipping" method="post">
                    @csrf
                     <div class="checkbox-form">						
                         <h3>Billing Details</h3>
                         <div class="row">
                             <div class="col-md-12">
                                 <div class="country-select">
                                     <label>Country <span class="required">*</span></label>
                                     <select>
                                       <option value="volvo">Bangladesh</option>
                                       <option value="saab">Algeria</option>
                                       <option value="mercedes">Afghanistan</option>
                                       <option value="audi">Ghana</option>
                                       <option value="audi2">Albania</option>
                                       <option value="audi3">Bahrain</option>
                                       <option value="audi4">Colombia</option>
                                       <option value="audi5">Dominican Republic</option>
                                     </select> 										
                                 </div>
                             </div>
                             <div class="col-md-12">
                                 <div class="checkout-form-list">
                                     <label>Full Name <span class="required">*</span></label>										
                                     <input name="name" class="text-capitalize" @if ($shippings) value="{{ $shippings->name }}"@endif  type="text" />
                                     <small class="custome-message2" id="nameMessage"></small>
                                 </div>
                             </div>
                             
                             <div class="col-md-12">
                                 <div class="checkout-form-list">
                                     <label>Email Address <span class="required">*</span></label>										
                                     <input name="email" class="text-lowercase" type="email"  @if ($shippings) value="{{ $shippings->email }}"@endif/>
                                    <small class="custome-message2" id="emailMessage"></small>
                                 </div>
                             </div>

                             <div class="col-md-12">
                                 <div class="checkout-form-list">
                                     <label>Phone  <span class="required">*</span></label>										
                                     <input type="text" name="phone" @if ($shippings) value="{{ $shippings->phone }}"@endif/>
                                    <small class="custome-message2" id="phoneMessage"></small>
                                 </div>
                             </div>

                             <div class="col-md-12">
                                 <div class="checkout-form-list">
                                     <label>Address <span class="required">*</span></label>
                                     <textarea name="address" rows="2"> @if ($shippings) {{ $shippings->address }}@endif</textarea>
                                     <small class="custome-message2" id="addressMessage"></small>
                                 </div>
                             </div>
                              
                                                         
                         </div>

                         <div class="order-button-payment">
                                 <input type="submit" value="Confirm Shipping Info" />
                         </div>													
                     </div>
                 </form>
             </div>	
             <div class="col-lg-6 col-md-12 col-12">
                 <div class="your-order">
                     <h3>Your order</h3>
                     <div class="your-order-table table-responsive">
                         <table>
                             <thead>
                                 <tr>
                                     <th class="product-name">Product</th>
                                     <th class="product-total">price</th>
                                     <th class="product-total">Total</th>
                                 </tr>							
                             </thead>
                             <tbody>
                                @foreach ($carts as $cart)
                                    <tr class="cart_item">
                                        <td class="product-name">
                                            {{$cart->name}} <strong class="product-quantity"> × {{$cart->qty}}</strong>
                                        </td>
                                        <td class="product-total">
                                            <span class="amount">$ {{$cart->price}}</span>
                                        </td>
                                        <td class="product-total">
                                            <span class="amount">$ {{$cart->price * $cart->qty}}</span>
                                        </td>
                                    </tr>
                                @endforeach
                                

                             </tbody>
                             <tfoot>
                                <tr class="cart-subtotal">
                                    <th>Cart Subtotal</th>
                                    <td><span class="amount">$ {{Cart::subtotal()}}</span></td>
                                </tr>
                                <tr class="cart-subtotal">
                                    <th>(+)Shipping Charge:</th>
                                    <td><span class="amount">$50</span></td>
                                </tr>
                                <tr class="order-total">
                                    <th>Order Total</th>
                                    <td><strong><span class="amount">$ {{Cart::subtotal()+50}}.00</span></strong>
                                    </td>
                                </tr>							
                             </tfoot>
                         </table>
                     </div>

                     @if ($shipsession)
                     <div class="payment-method">
                         <div class="payment-accordion">
                             <div class="panel-group" id="faq">
                                 <div class="panel panel-default">
                                     <div class="panel-heading">
                                         <h5 class="panel-title"><a data-toggle="collapse" aria-expanded="true" data-parent="#faq" href="#payment-1"> 1. Cash on Deliver</a></h5>
                                     </div>

                                     <div id="payment-1" class="panel-collapse collapse show">
                                         <div class="panel-body text-center">
                                             <form action="{{ url('/cash-payment') }}" method="post">
                                                @csrf
                                             <!--<p>Make your payment directly into our bank account.
                                              Please use your Order ID as the payment reference.
                                               Your order won’t be shipped until the funds have cleared in our account.</p>-->
                                               <button type="submit" class="btn btn-success btn-sm btn-hover rounded">Confirm Order</button>
                                            </form>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="panel panel-default">
                                     <div class="panel-heading">
                                         <h5 class="panel-title"><a class="collapsed" data-toggle="collapse" aria-expanded="false" data-parent="#faq" href="#payment-2"> 2. Bkash Payment</a></h5>
                                     </div>
                                     <div id="payment-2" class="panel-collapse collapse">
                                         <div class="panel-body">
                                             <span class="badge badge-danger">Bkash Payment is not availabel right now</span>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="panel panel-default">
                                     <div class="panel-heading">
                                         <h5 class="panel-title"><a class="collapsed" data-toggle="collapse" aria-expanded="false" data-parent="#faq" href="#payment-3"> 3. Stripe Payment</a></h5>
                                     </div>
                                     <div id="payment-3" class="panel-collapse collapse">
                                         <div class="panel-body">
                                            <form action="{{ url('/stripe-payment') }}" method="post" id="payment-form" style="border: 1px solid #e5e5e5;padding:20px;border-radius:5px;">
                                                @csrf
                                                <div class="form-row">
                                                  <label class="text-dark text-bold" for="card-element">
                                                    Credit or debit card
                                                  </label>
                                                  <div id="card-element">
                                                    <!-- A Stripe Element will be inserted here. -->
                                                  </div>
                                              
                                                  <!-- Used to display form errors. -->
                                                  <div id="card-errors" role="alert"></div>
                                                </div>
                                              
                                                <button class="btn btn-primary rounded mt-2">Pay now</button>
                                              </form>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                                                         
                         </div>
                     </div>
                     @else

                     @endif

                     
                 </div>
             </div>
         </div>
     </div>
 </div>

 <script>
     // Create a Stripe client.
var stripe = Stripe('#');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');
// Handle real-time validation errors from the card Element.
card.on('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}
 </script>
 <script src="{{ asset('assets/js/vendor/jquery-1.12.0.min.js') }}"></script>

<script>
   $(document).ready( function () { 


        $('#addShipping').on('submit', function(e){
            e.preventDefault();
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                method: "POST",
                url: "{{ url('/shipping-info') }}",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data){
                toastr.success('Shipping Info Confirmed Successfully !!');
                location.reload();

                },
                error: function (error) {
                $('#nameMessage').html('');
                $('#emailMessage').html('');
                $('#phoneMessage').html('');
                $('#addressMessage').html('');

                if(error.responseJSON.errors.name){
                    $('#nameMessage').append(`<span>` + error.responseJSON.errors.name + ` </span>`); 
                    }
                if(error.responseJSON.errors.email){
                    $('#emailMessage').append(`<span>` + error.responseJSON.errors.email + ` </span>`); 
                    }
                if(error.responseJSON.errors.phone){
                    $('#phoneMessage').append(`<span>` + error.responseJSON.errors.phone + ` </span>`); 
                    }
                if(error.responseJSON.errors.address){
                    $('#addressMessage').append(`<span>` + error.responseJSON.errors.address + ` </span>`); 
                    }
                
                    
                    
                    
                }
            });
        });


      
      
   });
</script>

@endsection