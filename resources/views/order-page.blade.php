<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css"  rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
@include('navbar.navbar')
    <div class="w-7/12 mx-auto my-5 ">
        <header class="flex justify-between border-b-2 border-dotted border-slate-200 bg-white drop-shadow-md p-2">
            <a href="/profile/orders/history" class="flex items-center">
                <svg class="mx-1 w-3 h-3 text-gray-800 dark:text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 1 1.3 6.326a.91.91 0 0 0 0 1.348L7 13"/>
                </svg>
                <h3>Back</h3>
            </a>
            <div class="flex items-center">
                <h3 class="mx-2">ORDER ID:{{$order->id}}</h3>
                    <span>|</span>
                @if ($order->status == 'processing')
                    <h3 class="text-orange-600 mx-2">PROCESSING ORDER</h3>
                @endif
                @if ($order->status == 'intransit')
                    <h3 class="text-orange-600 mx-2">ORDER IN TRANSIT</h3>
                @endif
                @if ($order->status == 'received')
                    <h3 class="text-orange-600 mx-2">ORDER RECEIVED</h3>
                @endif
                @if ($order->status == 'completed')
                    <h3 class="text-orange-600 mx-2">ORDER COMPLETED</h3>
                @endif
            </div>
        </header>
        <div class="border-b-2 border-dotted border-slate-100 bg-white drop-shadow-md p-2 py-6 px-6">
            <div class="flex justify-center items-center"> 
                <ol class="flex items-center w-full">
                    <div class="w-full">
                        <li class="flex mb-6 w-full items-center justify-center">
                            <span class="flex items-center justify-center w-10 h-10 text-white rounded-full lg:h-12 lg:w-12 dark:bg-orange-400 shrink-0">
                                <svg class="w-3.5 h-3.5 text-white lg:w-4 lg:h-4 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                                </svg>
                            </span>
                        </li>
                        <span class="flex items-center justify-center">
                            Order Placed
                        </span>
                    </div>
                    <div class="w-full">
                        <div class="flex justify-center items-center">
                            <li class="flex mb-6 w-full items-center justify-center">
                                <span class="flex items-center justify-center w-10 h-10 text-white rounded-full lg:h-12 lg:w-12 dark:bg-slate-400 shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash-stack" viewBox="0 0 16 16">
                                        <path d="M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1zm7 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4"/>
                                        <path d="M0 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V7a2 2 0 0 1-2-2z"/>
                                    </svg>
                                </span>
                            </li>
                        </div>
                        <span class="flex items-center justify-center">
                            Order Paid
                        </span>
                    </div>
                    <div class="w-full">
                        <li class="flex mb-6 w-full items-center justify-center">
                            <span class="flex items-center justify-center w-10 h-10 text-white rounded-full lg:h-12 lg:w-12 dark:bg-slate-400 shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16">
                                    <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5zm1.294 7.456A2 2 0 0 1 4.732 11h5.536a2 2 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456M12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2"/>
                                </svg>
                            </span>
                        </li>
                        <span class="flex items-center justify-center">
                            Order Shipped Out
                        </span>
                    </div>
                    <div class="w-full">
                        <li class="flex mb-6 w-full items-center justify-center">
                            <span class="flex items-center justify-center w-10 h-10 text-white rounded-full lg:h-12 lg:w-12 dark:bg-slate-400 shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-inbox" viewBox="0 0 16 16">
                                    <path d="M4.98 4a.5.5 0 0 0-.39.188L1.54 8H6a.5.5 0 0 1 .5.5 1.5 1.5 0 1 0 3 0A.5.5 0 0 1 10 8h4.46l-3.05-3.812A.5.5 0 0 0 11.02 4zm9.954 5H10.45a2.5 2.5 0 0 1-4.9 0H1.066l.32 2.562a.5.5 0 0 0 .497.438h12.234a.5.5 0 0 0 .496-.438zM3.809 3.563A1.5 1.5 0 0 1 4.981 3h6.038a1.5 1.5 0 0 1 1.172.563l3.7 4.625a.5.5 0 0 1 .105.374l-.39 3.124A1.5 1.5 0 0 1 14.117 13H1.883a1.5 1.5 0 0 1-1.489-1.314l-.39-3.124a.5.5 0 0 1 .106-.374z"/>
                                </svg>
                            </span>
                        </li>
                        <span class="flex items-center justify-center">
                            Order Received
                        </span>
                    </div>
                    <div class="w-full">
                        <li class="flex mb-6 w-full items-center justify-center">
                            <span class="flex items-center justify-center w-10 h-10 text-white rounded-full lg:h-12 lg:w-12 dark:bg-slate-400 shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                    <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z"/>
                                </svg>
                            </span>
                        </li>
                        <span class="flex items-center justify-center">
                            Order Completed
                        </span>
                    </div>
                </ol>
            </div>
        </div>
        <div class="mx-auto border-b-2 border-dotted border-slate-100 p-2 bg-amber-50 drop-shadow-md">
            <header class="mx-3 flex justify-between item-center">
                <div class="pt-2">
                    <h3>Thank you for shopping!</h3>
                </div>
                <div>
                    <button class="w-48 h-18 bg-orange-600 p-2 text-white">View Product</button>
                </div>
            </header>
        </div>
        <div class="border-b-2 border-dotted border-slate-100 bg-white drop-shadow-md">
            <header class="flex justify-between mx-4 p-2 drop-shadow-md">
                <div class="text-xl my-4">
                    <h3>Delivery Address</h3>
                </div>
                <div class="text-s my-4">
                    <h3>DELIVERY ID:5169012964926264</h3>
                </div>
            </header>
            <div class="flex">
                <div class="mx-6 mb-1 w-4/12 border-r-2 pr-6">
                    <div class="mb-4">
                        <h4>Angel Tidon</h4>
                    </div>
                    <div class="my-2 text-xs text-black">
                        <h4>(+63) 9772593898</h4>
                    </div>
                    <div class="my-2 text-xs text-black">
                        <p>Blk 6 Lot 60 Molave St. Hillcrest Vilage, Camarin Rd Barangay 173, Caloocan City, Metro Manila, Metro Manila, 1422</p>
                    </div>
                </div>
                <div class="mx-2 p-5">      
                    <ol class="relative border-s border-gray-200 dark:border-gray-700">                  
                        <li class="mb-10 ms-6 flex">            
                            <span class="absolute flex items-center justify-center w-6 h-6 bg-orange-400 rounded-full -start-3 ring-8 ring-white dark:ring-orange-400 dark:bg-orange-400">
                                <svg class="w-3.5 h-3.5 text-blue-600 lg:w-4 lg:h-4 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                                </svg>
                            </span>
                            <time class="block text-sm font-normal leading-none text-black dark:text-black mt-1">11/6/2023</time>
                            <div class="ml-4">
                                <h3 class="font-bold text-orange-400">Delivered</h3>
                                <p class="font-normal text-orange-400">Parcel has been delivered</p>
                            </div>
                        </li>
                        <li class="mb-10 ms-6 flex">
                            <span class="absolute flex items-center justify-center w-6 h-6 text-white rounded-full -start-3 ring-8 ring-white dark:ring-slate-400 dark:bg-slate-400">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16">
                                    <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5zm1.294 7.456A2 2 0 0 1 4.732 11h5.536a2 2 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456M12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2"/>
                                </svg>
                            </span>
                            <time class="block mb-2 text-sm font-normal leading-none text-black dark:text-black mt-1">11/6/2023</time>
                            <div class="ml-4">
                                <h3 class="font-bold text-black opacity-50">In Transit</h3>
                                <p class="font-normal text-black opacity-50">Parcel is out for delivery</p>
                            </div>
                        </li>
                        <li class="ms-6 flex">
                            <span class="absolute flex items-center justify-center w-6 h-6 text-white rounded-full -start-3 ring-8 ring-white dark:ring-slate-400 dark:bg-slate-400">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-seam" viewBox="0 0 16 16">
                                    <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2zm3.564 1.426L5.596 5 8 5.961 14.154 3.5zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464z"/>
                                </svg>
                            </span>
                            <time class="block mb-2 text-sm font-normal leading-none text-black dark:text-black mt-1">11/6/2023</time>
                            <div class="ml-4">
                                <h3 class="font-bold text-black opacity-50">Preparing Order</h3>
                                <p class="font-normal text-black opacity-50">Packaging order</p>
                            </div>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="relative overflow-x-auto bg-amber-50 border-slate-100 border-t-2 border-dotted drop-shadow-md">
        <hr class="h-px mx-6 my-4 bg-slate-200 border-0 dark:bg-slate-200">
        @php
            $totalPrice = 0;
        @endphp
        @foreach($orderItems as $orderItem)
            <div class="flex p-2 my-4">
                <div class="mx-4">
                    <img class="h-24 w-24" src="Img/chi.jpg" alt="">
                </div>
                <div>
                    <h3 class="mb-2">{{$orderItem->name}}</h3>
                    <h1 class="text-xs mb-2">{{$orderItem->category}}</h1>
                    <h1 class="text-xs mb-2">{{$orderItem->quantity}}</h1>
                </div>
                <div class="flex items-center ml-auto mr-4 text-orange-600">
                    <h3>₱{{ $orderItem->price * $orderItem->quantity }}</h3>
                </div>
            </div>
            @php
                $totalPrice += $orderItem->price * $orderItem->quantity;
            @endphp
        @endforeach
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <tbody class="">
                    <tr class="bg-slate-50 border-t-2">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white border-b-2 bg-amber-50 border-dotted">
                            
                        </th>
                        <td class="px-6 py-4 border-b-2 border-dotted bg-amber-50">
                            
                        </td>
                        <td class="px-6 py-4 border-b-2 border-dotted bg-amber-50">
                            
                        </td>
                        <td class="px-6 py-4 border-r-2 border-b-2 border-dotted bg-amber-50 text-black">
                            <p class="flex justify-end">Merchandise Subtotal</p>
                        </td>
                        <td class="px-6 py-4 border-b-2 border-dotted bg-amber-50 text-black">
                            <p class="flex justify-end">₱{{ $totalPrice }}</p>
                        </td>
                    </tr>
                    <tr class="">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white border-b-2 border-dotted">
                            
                        </th>
                        <td class="px-6 py-4 border-b-2 border-dotted">
                            
                        </td>
                        <td class="px-6 py-4 border-b-2 border-dotted">
                            
                        </td>
                        <td class="px-6 py-4 border-r-2 border-dotted border-b-2 text-black">
                            <p class="flex justify-end">Shipping Fee</p>
                        </td>
                        <td class="px-6 py-4 border-b-2 border-dotted text-black">
                            <p class="flex justify-end">₱40</p>
                        </td>
                    </tr>
                    <tr class="">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white border-b-2 border-dotted">
                            
                        </th>
                        <td class="px-6 py-4 border-b-2 border-dotted">
                            
                        </td>
                        <td class="px-6 py-4 border-b-2 border-dotted">
                            
                        </td>
                        <td class="px-6 py-4 border-r-2 border-b-2 border-dotted text-black">
                            <p class="flex justify-end">Order Total</p>
                        </td>
                        <td class="px-6 py-4 border-b-2 text-orange-600 border-dotted text-black">
                            <p class="flex justify-end">₱100</p>
                        </td>
                    </tr>
                    <tr class="">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            
                        </th>
                        <td class="px-6 py-4">
                            
                        </td>
                        <td class="px-6 py-4">
                            
                        </td>
                        <td class="px-6 py-4 border-r-2 border-dotted text-black">
                            <p class="flex justify-end">Payment Method</p>
                        </td>
                        <td class="px-6 py-4 text-black">
                            <p class="flex justify-end">Gcash/COD</p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>