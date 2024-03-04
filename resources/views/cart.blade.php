<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Cart</title>
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css"  rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    @vite(['resources/css/app.css','resources/js/app.js'])
  </head>

  <body class="bg-gray-100">
    @include('navbar.navbar')

    <div class=" relative container mx-auto">
      <div class="flex shadow-md my-10">
        <div class="w-3/4 bg-white px-10 py-10">
          <div class="flex justify-between border-b pb-8">
            <h1 class="font-semibold text-2xl">Shopping Cart</h1>
            <h2 id="itemnum" class="font-semibold text-2xl">X Items</h2>
          </div>
          <div class="flex mt-10 mb-5">
            <h3 class="font-semibold text-gray-600 text-xs uppercase w-2/5">Product Details</h3>
            <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5">Quantity</h3>
            <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5">Price</h3>
            <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5">Total</h3>
          </div>

          @php
            $inStockCount = 0;
          @endphp

          {{-- product loop start --}}

          @foreach ($usercart as $cartItem)

          {{-- in stock layout start --}}
          @if( $cartItem->computed_quantity != null || $cartItem->computed_quantity != 0 )

            @php
              $inStockCount++;
            @endphp

            <div class="flex items-center hover:bg-gray-100 -mx-8 px-6 py-5">
              <div class="flex w-2/5"> <!-- product -->
                <div class="w-20">
                  <img class="h-24" src="{{ asset('./products/'.$cartItem->image )}}" alt="">
                </div>
                <div class="flex flex-col justify-center items-center ml-4 flex-grow">
                  <span class="font-bold text-sm justify-items-center"><p> <p></span>
                      <span class="font-bold text-sm justify-items-center">{{$cartItem->name}}</span>
                  <a href="#" class="font-semibold hover:text-red-500 text-gray-500 text-xs"> </a>
                </div>
              </div>
              {{-- quantity start --}}
              <div class="flex justify-center w-1/5">

                <button
                  id="decrement{{$cartItem->id}}"
                  class="w-1/6 flex items-center justify-center pb-1 pl-0.5 text-blackrounded-l outline-none cursor-pointer hover:bg-gray-400 rounded-tl-xl rounded-bl-xl">
                  <span class="text-2xl font-thin">-</span>
                </button>

                <input id="quantity{{$cartItem->id}}" type="number" value="{{$cartItem->quantity}}"
                class="[appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none 
                flex items-center w-1/3 font-semibold text-center text-black bg-white outline-none focus:outline-none text-md hover:text-black">

                <button
                  id="increment{{$cartItem->id}}"
                  class="w-1/6 flex items-center justify-center pb-1 text-blackrounded-l outline-none cursor-pointer hover:bg-gray-400 rounded-tr-xl rounded-br-xl">
                  <span class="m-auto text-2xl font-thin">+</span>
                </button>

              </div>
              {{-- quantity end --}}

              <span class="text-center w-1/5 font-semibold text-sm">₱{{$cartItem->price}}</span>
              <span name="cartitemSubtotal" id="totalPrice{{$cartItem->id}}" class="text-center w-1/5 font-semibold text-sm">₱{{number_format($cartItem->price * $cartItem->quantity, 2)}}</span>
              <script>
                var stock{{$cartItem->id}} = parseInt("{{$cartItem->computed_quantity}}");
                var quantityInput{{$cartItem->id}} = document.getElementById('quantity{{$cartItem->id}}');
                var decrementButton{{$cartItem->id}} = document.getElementById('decrement{{$cartItem->id}}');
                var incrementButton{{$cartItem->id}} = document.getElementById('increment{{$cartItem->id}}');
                var totalPriceElement{{$cartItem->id}} = document.getElementById('totalPrice{{$cartItem->id}}');

                if (document.getElementById('quantity{{$cartItem->id}}')!=null){
                  var id = '{{$cartItem->id}}';
                  var currentValue = parseInt(quantityInput{{$cartItem->id}}.value, 10); 
                } else {
                  var currentValue = 0;
                }

                decrementButton{{$cartItem->id}}.addEventListener('click', function () {
                    decrementQuantity({{$cartItem->id}},{{$cartItem->computed_quantity}},{{$cartItem->price}});
                });

                incrementButton{{$cartItem->id}}.addEventListener('click', function () {
                    incrementQuantity({{$cartItem->id}},{{$cartItem->computed_quantity}},{{$cartItem->price}});
                });

                quantityInput{{$cartItem->id}}.addEventListener('input', function () {
                    validateQuantity({{$cartItem->id}},{{$cartItem->computed_quantity}});
                });

                document.addEventListener('DOMContentLoaded', function() {
                  if (quantityInput{{$cartItem->id}}.value==1){
                  decrementButton{{$cartItem->id}}.style.opacity=0;
                } else if (quantityInput{{$cartItem->id}}.value==stock{{$cartItem->id}}) {
                  incrementButton{{$cartItem->id}}.style.opacity=0;
                }
                });

              </script>
              <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
              <script>
                  $.ajaxSetup({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                  });
              </script>
              <script>
                console.log("changed");
                var quantityInput = document.getElementById("quantity{{$cartItem->id}}");
                $(quantityInput).change(function(e) {
                        $.ajax({
                            type: 'POST',
                            url: '/updatecart',
                            data: {
                                quantity = quantityInput.value();
                            },
                            success: function(response) {
                            },
                            error: function() {
                            }
                        });
                    });
              </script>
            </div>

          {{-- in stock layout end --}}

          {{-- out of stock layout start --}}
          @else
            <script>
              console.log("{{ $cartItem->name }}","out of stock");
            </script>
            <div class="flex items-center bg-gray-300 z-40 -mx-8 px-6 py-5 opacity-25">
              <div class="flex w-2/5"> <!-- product -->
                <div class="w-20">
                  <img class="h-24" src="{{ asset('./products/'.$cartItem->image )}}" alt="">
                </div>
                <div class="flex flex-col justify-center items-center ml-4 flex-grow">
                  <span class="font-bold text-sm justify-items-center"><p> <p></span>
                      <span class="font-bold text-sm justify-items-center">{{$cartItem->name}}</span>
                  <a href="#" class="font-semibold hover:text-red-500 text-gray-500 text-xs"> </a>
                </div>
              </div>
              {{-- quantity start --}}
              <div class="flex flex-col items-center w-1/5">
                <input id="quantity{{$cartItem->id}}" type="number" value="{{$cartItem->quantity}}"
                class="[appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none 
                flex items-center w-1/3 font-semibold text-center text-gray-500 bg-white outline-none focus:outline-none text-md"
                disabled>
                <p class="text-red-500 font-medium">Out of Stock</p>
              </div>
              {{-- quantity end --}}

              <span class="text-center w-1/5 font-semibold text-sm">₱{{$cartItem->price}}</span>
              <span class="text-center w-1/5 font-semibold text-sm">₱{{number_format($cartItem->price * $cartItem->quantity, 2)}}</span>
            </div>

          @endif
          {{-- out of stock layout end --}}

          @endforeach

          <script>
            document.addEventListener('DOMContentLoaded', function() {
                var countPlaceholder = document.getElementById('itemnum');
                if (countPlaceholder) {
                    countPlaceholder.textContent = {{ $inStockCount }}+' Items';
                }
            });
          </script>

          <script>
            function decrementQuantity(id,stock,price) {

              var quantityInput = document.getElementById('quantity' + id);

              var currentValue = parseInt(quantityInput.value, 10); 

              if (quantityInput.value === 1) {
                document.getElementById('decrement'+id).style.opacity=0;
                document.getElementById('decrement'+id).style.cursor='default';
              } else if (quantityInput.value > 1) {
                document.getElementById('increment'+id).style.opacity=1;
                document.getElementById('increment'+id).style.cursor='pointer';
                currentValue = currentValue - 1; 
                quantityInput.value = currentValue;
                updateTotalPrice(id,price);
                updateOverallSubtotal();
                if (currentValue === 1) {
                  document.getElementById('decrement'+id).style.opacity=0;
                  document.getElementById('decrement'+id).style.cursor='default';
                }
              }
              console.log('dec cartitemid=',id," ", quantityInput.value);
              validateQuantity(id, stock);
            }

            function incrementQuantity(id,stock,price) {

              var quantityInput = document.getElementById('quantity' + id);

              var currentValue = parseInt(quantityInput.value, 10); 
                
              if (quantityInput.value < stock) {
                document.getElementById('increment'+id).style.opacity=1;
                currentValue = currentValue + 1; 
                quantityInput.value = currentValue;
                updateTotalPrice(id,price);
                updateOverallSubtotal();
                document.getElementById('decrement'+id).style.opacity=1;
                document.getElementById('decrement'+id).style.cursor='pointer';
                if (quantityInput.value == stock) {
                  document.getElementById('increment'+id).style.opacity=0;
                  document.getElementById('increment'+id).style.cursor='default';
                }
              } else { 
                document.getElementById('increment'+id).style.opacity=0;
                document.getElementById('increment'+id).style.cursor='default';
                quantityInput.value = stock;
              }
              console.log('inc cartitemid=',id," ", quantityInput.value);
              validateQuantity(id, stock);

            }

            function updateTotalPrice(id,price) {
                totalPriceElement = document.getElementById('totalPrice' + id);
                var quantityInput = document.getElementById('quantity' + id);
                var itemPrice = parseFloat(price);
                var quantity = parseFloat(quantityInput.value);
                var total = itemPrice * quantity;
                totalPriceElement.textContent = '₱' + total.toFixed(2);
            }

            function validateQuantity(id, stock) {
              var quantityInput = document.getElementById('quantity' + id);

              var currentValue = parseInt(quantityInput.value, 10); 

              if (isNaN(currentValue) || currentValue < 1) {
                  quantityInput.value = 1;
              } else if (currentValue < 1 && currentValue > stock) {

              } else if (currentValue > stock) {
                  quantityInput.value = stock;
              }
            }
          </script>

          {{-- product loop end --}}
  
          <a href="/" class="flex font-semibold text-black text-sm mt-10">
        
            <svg class="fill-current mr-2 text-black w-4" viewBox="0 0 448 512"><path d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"/></svg>
            Continue Shopping
          </a>
        </div>
        <div id="summary" class="w-1/4 px-8 py-10 bg-orange-500	background-color: rgb(249 115 22) opacity-85	opacity: 0.85;">
          <h1 class="text-white font-bold text-2xl border-b pb-8 text-center">Order Summary</h1>
          <div class="flex font-bold justify-between py-6 text-sm uppercase text-white">
            <span>Ship to</span>
            <span id="address" class="text-white font-bold">Metro Manila</span>
          </div>
          <div class="flex flex-col font-bold justify-between text-sm uppercase text-white">
            <span>Shipping Method</span>
            <div class="my-6">
              <div class="flex items-center mb-4 ">
                <input id="default-radio-1" type="radio" value="" name="default-radio" class="w-4 h-4 text-blue-300 focus:ring-blue-500 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="default-radio-1" class="ms-2 text-sm font-medium text-white dark:text-white">Same Day Delivery</label>
              </div>
              <div class="flex items-center">
                <input checked id="default-radio-2" type="radio" value="" name="default-radio" class="w-4 h-4 text-blue-300 bg-gray-100 border-gray-300 focus:ring-blue-500  dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="default-radio-2" class="ms-2 text-sm font-medium text-white dark:text-white">Next Day Delivery</label>
              </div>

            </div>

          </div>
          <div class="flex justify-between mt-4 mb-5">
            <span class="font-bold text-sm uppercase text-white">Subtotal</span>
            <span id="subTotal" class="font-bold text-sm text-white">₱1,030.00</span>
          </div>
          <div>
            <label class="font-bold inline-block mb-3 text-sm uppercase text-white">Shipping Date:</label>
            <div class="relative max-w-sm">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                  <svg class="w-4 h-4 text-gray-500 dark:text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                  </svg>
                </div>
                <input datepicker type="text" class="bg-white border border-gray-300 text-black text-sm rounded-lg block w-full ps-10 p-2.5 dark:bg-white dark:border-white dark:placeholder-black dark:text-black" placeholder="Select date" style="background-color= white;">
              </div>
          </div>
          <div class="border-t mt-8">
            <div class="flex font-bold justify-between py-6 text-sm uppercase text-white">
              <span>Shipping fee</span>
              <span id="priceShippingFee" class="text-white font-bold">₱100</span>
            </div>
            <div class="flex font-bold justify-between py-6 text-sm uppercase text-white my-4">
                <span>TOTAL</span>
              </div>
              <div class="container mx-auto w-3/4 px-4 py-2 bg-stone-100 font-semibold  rounded-2xl    ">
              <p id="priceTotal" class="text-center"> ₱1,030.00 </p>
                <script>
                  function updateOverallSubtotal() {
                      var cartitemSubtotals = document.getElementsByName('cartitemSubtotal');
                      var overallSubtotal = 0;
    
                      for (var i = 0; i < cartitemSubtotals.length; i++) {
                          var subtotalValue = parseFloat(cartitemSubtotals[i].textContent.replace('₱', '').trim());
                          overallSubtotal += subtotalValue;
                      }

                      document.getElementById('subTotal').textContent = '₱' + overallSubtotal.toFixed(2);
                      var priceShippingFee = parseFloat(document.getElementById('priceShippingFee').textContent.replace('₱', '').trim()) || 0;
                      var priceTotal = document.getElementById('priceTotal');
                      var priceTotalInt = 0;
                      priceTotalInt = overallSubtotal + priceShippingFee;
                      priceTotal.textContent = '₱' + priceTotalInt.toFixed(2);
                  }
                  updateOverallSubtotal();
                </script>
              </div>

            <button class="bg-stone-100 font-bold hover:bg-stone-600 py-3 text-sm text-slate-950 uppercase w-full rounded-2xl my-4	border-radius: 1rem;">Proceed to Payment</button>
          </div>
        </div>

      </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
  </body>









  