<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RFG - My Cart</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css"  rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="icon" href="./Img/logo1.png" type="image/x-icon">
  </head>

  <body class="bg-gray-100">
    @include('navbar.navbar')
 
    <a href="/" class="ml-48 relative mt-6 bg-white w-52 h-10 flex justify-center items-center rounded-lg drop-shadow-md cursor-pointer">
        <div name="ribbon" class="flex font-semibold text-black text-sm items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-left" viewBox="0 0 16 16" style="vertical-align: middle;">
                <path fill-rule="evenodd" d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0z"/>
                <path fill-rule="evenodd" d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708z"/>
            </svg>
            <p class="ml-1">Continue Shopping</p>
        </div>
    </a>

    <div class="container mx-auto">
      <div class="flex flex-col shadow-md my-6 md:flex-row">
        <div class="md:w-3/4 bg-white px-10 py-10">
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
          {{-- in stock layout start --}}
          @foreach ($usercart as $cartItem)

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
              <div class="flex flex-col items-center justify-center w-1/5 relative">
                <div class="flex items-center justify-center">
                    <button id="decrement{{$cartItem->id}}"
                            class="w-1/6 flex items-center justify-center pb-1 pl-0.5 text-black rounded-l outline-none cursor-pointer hover:bg-gray-400 rounded-tl-xl rounded-bl-xl">
                        <span class="text-2xl font-thin">-</span>
                    </button>

                <input id="quantity{{$cartItem->id}}" type="number" value="{{$cartItem->quantity}}"
                      class="[appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none 
                      flex items-center w-1/3 font-semibold text-center text-black bg-white outline-none focus:outline-none text-md hover:text-black">

                <button id="increment{{$cartItem->id}}"
                        class="w-1/6 flex items-center justify-center pb-1 text-black rounded-l outline-none cursor-pointer hover:bg-gray-400 rounded-tr-xl rounded-br-xl">
                    <span class="m-auto text-2xl font-thin">+</span>
                </button>
              </div>
              <div class="mt-2 text-xs font-bold">Stock Left: {{$cartItem->stock}}</div>
              </div>
          

            {{-- quantity end --}}

              <span class="text-center w-1/5 font-semibold text-sm">₱{{$cartItem->price}}</span>
              <span name="cartitemSubtotal" id="totalPrice{{$cartItem->id}}" class="text-center w-1/5 font-semibold text-sm">₱{{number_format($cartItem->price * $cartItem->quantity, 2)}}</span>
              <div class="relative"><button onclick="deletecart({{ $cartItem->id }})" class="absolute -mt-2 right-3"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill text-red-500" viewBox="0 0 16 16"><path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/></svg></button></div>

              <script>
                var stock{{$cartItem->id}} = parseInt("{{$cartItem->stock}}");
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
                    decrementQuantity({{$cartItem->id}},{{$cartItem->stock}},{{$cartItem->price}});
                });

                incrementButton{{$cartItem->id}}.addEventListener('click', function () {
                    incrementQuantity({{$cartItem->id}},{{$cartItem->stock}},{{$cartItem->price}});
                });

                quantityInput{{$cartItem->id}}.addEventListener('input', function () {
                    validateQuantity({{$cartItem->id}},{{$cartItem->stock}});
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
                                quantity: quantityInput.value
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

          @endforeach

          {{-- out of stock layout start --}}

          @foreach ($usercartnostock as $cartItem)

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
        
          
        </div>

        <div id="summary" class="px-8 py-10 bg-orange-400">
          <h1 class="text-white font-bold text-2xl border-b pb-8 text-center">Order Summary</h1>
          <div class="flex flex-col justify-between pt-4 text-sm uppercase text-white">
            <span class="font-bold text-lg">Ship to</span>
            <span id="address" class="text-white ml-5 mb-5">
              @if (isset($user->region))
                {{$user->region}}, {{$user['state/province']}}, {{$user['city/municipality']}}, {{$user['barangay']}}, <br>{{$user['addressline']}}
              @else
                REGION I (ILOCOS REGION), ILOCOS NORTE, PAOAY, OAIG-UPAY-ABULAO,<br>
                B6 L6D MOLAVE ST. HILLCREST VILLAGE, CAMARIN ROAD
              @endif
            </span>
          </div>
          <div class="flex flex-col justify-between text-sm uppercase text-white">
            <span class="text-lg font-bold">Shipping Method</span>
            <p class="text-xs text-white"><span style="color: blue">*</span>only available for deliveries within metro manila</p>
            <div name="shipping_methods" class="mt-2 flex flex-col ml-5 mb-6">
              <form id="deliveryForm" action="PLACEHOLDERDELIVER.php" method="post">
                <div class="flex w-max rounded-lg select-none bg-white">
                    <label class="radio flex flex-grow items-center justify-center rounded-lg cursor-pointer">
                        <input type="radio" name="deliveryMethod" value="Express" class="peer hidden" checked="">
                        <span class="tracking-widest peer-checked:bg-orange-500  peer-checked:text-white text-black p-2 rounded-lg transition duration-150 ease-in-out">Express</span>
                    </label>
                    <label class="radio flex flex-grow items-center justify-center rounded-lg cursor-pointer">
                        <input type="radio" name="deliveryMethod" value="SameDay" class="peer hidden" @if ($user->region!='National Capital Region (NCR)') disabled @endif>
                        <span class="tracking-widest peer-checked:bg-orange-500  peer-checked:text-white text-black p-2 ml-2 rounded-lg transition duration-150 ease-in-out"><span style="color: blue">*</span>Same Day</span>
                    </label>
                    <label class="radio flex flex-grow items-center justify-center rounded-lg cursor-pointer">
                        <input type="radio" name="deliveryMethod" value="NextDay" class="peer hidden" @if ($user->region!='National Capital Region (NCR)') disabled @endif>
                        <span class="tracking-widest peer-checked:bg-orange-500  peer-checked:text-white text-black p-2 ml-2 rounded-lg transition duration-150 ease-in-out"><span style="color: blue">*</span>Next Day</span>
                    </label>
                </div>
              </form>
            </div>

              <span class="text-lg font-bold">Payment Method</span>
              <p class="text-xs  text-white"><span style="color: blue">*</span>only available for deliveries within metro manila</p>
              <div name="shipping_methods" class="mt-3 flex flex-col ml-5">
                  <div>
                      <select name="paymentMethod" id="paymentMethod" class="rounded-lg w-1/2 mb-1 text-black">
                          <option value="cod" @if ($user->region!='National Capital Region (NCR)') disabled @endif>*Cash on Delivery</option>
                          <option value="paymaya">Paymaya</option>
                      </select>
                  </div>
              </div>
          </div>

          <div class="flex justify-between mt-4 ">
            <span class="font-bold text-sm uppercase text-white">Subtotal</span>
            <span id="subTotal" class="text-sm text-white"></span>
          </div>
          <div>
            {{-- <label class="font-bold inline-block mb-3 text-sm uppercase text-white">Shipping Date:</label>
            <div class="relative max-w-sm">
              <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                </svg>
              </div>
              <input datepicker type="text" class="bg-white border border-gray-300 text-black text-sm rounded-lg block w-full ps-10 p-2.5 dark:bg-white dark:border-white dark:placeholder-black dark:text-black" placeholder="Select date" style="background-color= white;">
            </div> --}}
            <div class="flex justify-between mt-4 text-sm uppercase text-white">
            <span class="font-bold">Shipping fee</span>
            <span id="priceShippingFee" class="text-white">₱100</span>
            </div>
          </div>
          <div class="border-t mt-4">
            <div class="flex justify-between text-xl uppercase text-white py-4">
                <span class="font-bold">TOTAL</span>
                <p id="priceTotal" class="text-center"> ₱0.00 </p>
              </div>
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
                document.addEventListener('DOMContentLoaded', function() {
                  var radioButtons = document.querySelectorAll('input[type=radio][name=deliveryMethod]');

                  var deliveryChoice = document.getElementById("DeliveryChoice");
                  var priceShippingFee = document.getElementById('priceShippingFee');
                  radioButtons.forEach(function(radioButton) {
                      radioButton.addEventListener('change', function() {
                          if (this.checked) {
                              console.log('Selected value:', this.value);
                              if(this.value=='Express') {
                                priceShippingFee.textContent = '₱100';
                              } else if(this.value=='SameDay') {
                                priceShippingFee.textContent = '₱150';
                              } else if(this.value=='NextDay') {
                                priceShippingFee.textContent = '₱100';
                              }
                              // You can use this value as needed
                              updateOverallSubtotal();
                          }
                      });
                  });

                  // deliveryChoice.addEventListener('change', function() {
                  //   var deliveryChoiceValue = deliveryChoice.value;
                  //   if(deliveryChoiceValue == 'Express') {
                  //     console.log('express');
                  //     priceShippingFee.textContent = '₱100';
                  //   } else if (deliveryChoiceValue == 'SameDay') {
                  //     console.log('sameday');
                  //     priceShippingFee.textContent = '₱150';
                  //   } else if (deliveryChoiceValue == 'NextDay') {
                  //     console.log('nextday');
                  //     priceShippingFee.textContent = '₱100';
                  //   }
                  //   updateOverallSubtotal();
                  // });
                });
              </script>


              <form id="checkoutForm" method="POST">
                @csrf
                <input type="hidden" id="user_id" name="user_id" value="{{$user->id}}">
                <input type="hidden" id="status" name="status" value="processing">
                <input type="hidden" id="payment_method" name="payment_method" value="cod">
                @foreach ($usercart as $index => $cartItem)
                <input type="hidden" name="cartItems[{{ $index }}][id]" value="{{ $cartItem->id }}">
                  <input type="hidden" name="cartItems[{{ $index }}][product_id]" value="{{ $cartItem->product_id }}">
                  <input type="hidden" name="cartItems[{{ $index }}][quantity]" value="{{ $cartItem->quantity }}">
                  <input type="hidden" name="cartItems[{{ $index }}][price]" value="{{ $cartItem->price }}">
                  <input type="hidden" id="status" name="status" value="processing">
                @endforeach

                <input type="submit" value="@if ($inStockCount== 0) No items in cart @else Confirm Order @endif" class="@if ($inStockCount!= 0) bg-stone-100 hover:bg-stone-500 @else bg-stone-500 @endif font-bold  py-3 text-sm text-slate-950 uppercase w-full rounded-2xl my-4" @if ($inStockCount== 0) disabled @endif></input>

              </form>

              <script>
                document.addEventListener('DOMContentLoaded', function() {
                  const form = document.getElementById('checkoutForm');
                  const paymentMethodSelect = document.getElementById('paymentMethod');
                  if (paymentMethodSelect.value === 'cod') {
                      form.action = '/orders/add';
                    } else if (paymentMethodSelect.value === 'paymaya') {
                      form.action = '/orders/add/maya';
                    }
              
                  paymentMethodSelect.addEventListener('change', function() {
                    if (paymentMethodSelect.value === 'cod') {
                      form.action = '/orders/add';
                    } else if (paymentMethodSelect.value === 'paymaya') {
                      form.action = '/orders/add/maya';
                    }
                  });
                });
              </script>

            {{-- <button class="@if ($inStockCount!= 0) bg-stone-100 hover:bg-stone-500 @else bg-stone-500 @endif font-bold  py-3 text-sm text-slate-950 uppercase w-full rounded-2xl my-4" @if ($inStockCount== 0) disabled @endif>@if ($inStockCount== 0) No items in cart @else Confirm Order @endif</button> --}}
          </div>
        </div>

      </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
      </body>
