<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css"  rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    <style>
      #summary {
        background-color: ;
      }
    </style>
    @vite(['resources/css/app.css','resources/js/app.js'])
  </head>

  <body class="bg-gray-100">
    @include('navbar.navbar')

    <div class="container mx-auto">
      <div class="flex shadow-md my-10">
        <div class="w-3/4 bg-white px-10 py-10">
          <div class="flex justify-between border-b pb-8">
            <h1 class="font-semibold text-2xl">Shopping Cart</h1>
            <h2 class="font-semibold text-2xl">3 Items</h2>
          </div>
          <div class="flex mt-10 mb-5">
            <h3 class="font-semibold text-gray-600 text-xs uppercase w-2/5">Product Details</h3>
            <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5">Quantity</h3>
            <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5">Price</h3>
            <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5">Total</h3>
          </div>
          <div class="flex items-center hover:bg-gray-100 -mx-8 px-6 py-5">
            <div class="flex w-2/5"> <!-- product -->
              <div class="w-20">
                <img class="h-24" src="./img/chi.jpg" alt="">
              </div>
              <div class="flex flex-col justify-center items-center ml-4 flex-grow">
                
                <span class="font-bold text-sm justify-items-center">RG's Sukang Tuba<p> COCONUT SAP<p> VINEGAR (500 ML)</span>
                
                <a href="#" class="font-semibold hover:text-red-500 text-gray-500 text-xs"> </a>
              </div>
            </div>
            <div class="flex justify-center w-1/5">
              <svg class="fill-current text-gray-600 w-3" viewBox="0 0 448 512"><path d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"/>
              </svg>
  
              <input class="mx-2 border text-center w-8" type="text" value="1">
  
              <svg class="fill-current text-gray-600 w-3" viewBox="0 0 448 512">
                <path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"/>
              </svg>
            </div>
            <span class="text-center w-1/5 font-semibold text-sm">$400.00</span>
            <span class="text-center w-1/5 font-semibold text-sm">$400.00</span>
          </div>
  
          <div class="flex items-center hover:bg-gray-100 -mx-8 px-6 py-5">
            <div class="flex w-2/5"> <!-- product -->
              <div class="w-20">
                <img class="h-24" src="./img/trio1.jpg" alt="">
              </div>
              <div class="flex flex-col justify-center items-center ml-4 flex-grow">
                <span class="font-bold text-sm justify-items-center">RG's SUKANG TUBA<p> COCONUT SAP<p>VINEGAR(500 ML)</span>
                
                <a href="#" class="font-semibold hover:text-red-500 text-gray-500 text-xs"> </a>
              </div>
            </div>
            <div class="flex justify-center w-1/5">
              <svg class="fill-current text-gray-600 w-3" viewBox="0 0 448 512"><path d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"/>
              </svg>
  
              <input class="mx-2 border text-center w-8" type="text" value="1">
  
              <svg class="fill-current text-gray-600 w-3" viewBox="0 0 448 512">
                <path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"/>
              </svg>
            </div>
            <span class="text-center w-1/5 font-semibold text-sm">$40.00</span>
            <span class="text-center w-1/5 font-semibold text-sm">$40.00</span>
          </div>

          {{-- @foreach --}}

          <div class="flex items-center hover:bg-gray-100 -mx-8 px-6 py-5">
            <div class="flex w-2/5"> <!-- product -->
              <div class="w-20">
                <img class="h-24" src="./img/spiced.jpg" alt="">
              </div>
              <div class="flex flex-col justify-center items-center ml-4 flex-grow">
                <span class="font-bold text-sm justify-items-center"><p> <p></span>
                    <span class="font-bold text-sm justify-items-center">RG's SUKANG TUBA<p> COCONUT SAP<p>VINEGAR(500 ML)</span>
                <a href="#" class="font-semibold hover:text-red-500 text-gray-500 text-xs"> </a>
              </div>
            </div>
            {{-- quantity start --}}
            <div class="flex justify-center w-1/5">

              <button
                id="decrement"
                class="w-10 flex text-blackrounded-l outline-none cursor-pointer dark:hover:bg-gray-700 dark:text-black hover:text-gray-700 dark:bg-stone-300 hover:bg-gray-400">
                <span class="m-auto text-2xl font-thin">-</span>
              </button>

              <input id="quantity" type="number" placeholder="1"
              class="[appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none 
              flex items-center w-full font-semibold text-center text-black placeholder-black bg-gray-300 outline-none dark:text-black dark:placeholder-black dark:bg-stone-400 focus:outline-none text-md hover:text-black">
              
              <button
                id="increment"
                class="w-10 flex text-blackrounded-l outline-none cursor-pointer dark:hover:bg-gray-700 dark:text-black hover:text-gray-700 dark:bg-stone-300 hover:bg-gray-400">
                <span class="m-auto text-2xl font-thin">+</span>
              </button>

              <script>

                  // var stock = parseInt(" $product->computed_quantity ");
                  var stock = parseInt("3");

                  document.getElementById('decrement').addEventListener('click', function () {
                      decrementQuantity();
                  });

                  document.getElementById('increment').addEventListener('click', function () {
                      incrementQuantity();
                  });

                  document.getElementById('quantity').addEventListener('input', function () {
                      validateQuantity();
                  });

                  function decrementQuantity() {
                      var quantityInput = document.getElementById('quantity');
                      var currentValue = parseInt(quantityInput.value, 10);

                      if (!isNaN(currentValue) && currentValue > 1) {
                          quantityInput.value = currentValue - 1;
                      }
                      validateQuantity();
                  }

                  function incrementQuantity() {
                      var quantityInput = document.getElementById('quantity');
                      var currentValue = parseInt(quantityInput.value, 10);

                      if (!isNaN(currentValue) && currentValue < stock) {
                          quantityInput.value = currentValue + 1;
                      } else {
                          if (quantityInput.value === '') {  // Check if the input is empty
                              quantityInput.value = 1;
                          } else {
                              quantityInput.value = stock;
                          }
                      }
                      validateQuantity();
                  }

                  function validateQuantity() {
                      var quantityInput = document.getElementById('quantity');
                      var currentValue = parseInt(quantityInput.value, 10);

                      if (isNaN(currentValue) || currentValue < 1) {
                          quantityInput.value = 1;
                      } else if (currentValue > stock) {
                          quantityInput.value = stock;
                      }
                  }

              </script>

            </div>
            <span class="text-center w-1/5 font-semibold text-sm">Product Price</span>
            <span class="text-center w-1/5 font-semibold text-sm">Total</span>
          </div>

          {{-- @endforeach --}}
  
          <a href="/" class="flex font-semibold text-indigo-600 text-sm mt-10">
        
            <svg class="fill-current mr-2 text-indigo-600 w-4" viewBox="0 0 448 512"><path d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"/></svg>
            Continue Shopping
          </a>
        </div>
  
        <div id="summary" class="w-1/4 px-8 py-10 bg-orange-500	background-color: rgb(249 115 22) opacity-85	opacity: 0.85;">
          <h1 class="font-bold text-2xl border-b pb-8 text-center">Order Summary</h1>
          <div class="flex justify-between mt-10 mb-5">
            <span class="font-bold text-sm uppercase text-slate-100">Subtotal</span>
            <span class="font-semibold text-sm">₱1,030.00</span>
          </div>
          <div>
            <label class="font-bold inline-block mb-3 text-sm uppercase text-slate-100">Shipping Date:</label>
            
              
        
            <div class="relative max-w-sm">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                  <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                  </svg>
                </div>
                <input datepicker type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
              </div>
  

            
          </div>
          
          
          <div class="border-t mt-8">
            
            <div class="flex font-bold justify-between py-6 text-sm uppercase text-slate-100">
              <span>Shipping fee</span>
              <span class="text-black font-bold">₱600</span>
            </div>
            <div class="flex font-bold justify-between py-6 text-sm uppercase text-slate-100 my-4">
                <span>TOTAL</span>
              </div>
              <div class="container mx-auto w-3/4 px-4 py-2 bg-stone-100 font-semibold  rounded-2xl    ">
              <p class="text-center"> ₱1,030.00 </p>
              </div>

            <button class="bg-stone-100 font-bold hover:bg-stone-600 py-3 text-sm text-slate-950 uppercase w-full rounded-2xl my-4	border-radius: 1rem;">Checkout</button>
          </div>
        </div>

      </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
  </body>









  