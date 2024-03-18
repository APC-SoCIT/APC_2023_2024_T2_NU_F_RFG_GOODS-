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
    <div class="container mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <div class="w-full mx-auto">
            <header class="flex justify-between border-b-2 border-dotted border-slate-200 bg-white drop-shadow-md p-2">
                <a href="/profile/orders/history" class="flex items-center">
                    <svg class="mx-1 w-3 h-3 text-gray-800 dark:text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 1 1.3 6.326a.91.91 0 0 0 0 1.348L7 13"/>
                    </svg>
                    <h3>Back</h3>
                </a>
                <div class="flex items-center">
                    <h3 class="mx-2">ORDER ID: {{$order->id}}</h3>
                    
                </div>
            </header>
            <div class="border-b-2 border-dotted border-slate-100 bg-white drop-shadow-md p-2 py-6 px-6">
                <div class="flex justify-center items-center">
                    <ol class="flex items-center w-full text-center">
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
                            @if($order->status == 'confirmed' || $order->status == 'intransit' || $order->status == 'received' || $order->status == 'completed')
                                <li class="flex mb-6 w-full items-center justify-center">
                                        <span class="flex items-center justify-center w-10 h-10 text-white rounded-full lg:h-12 lg:w-12 dark:bg-orange-400 shrink-0">
                                        <svg class="w-3.5 h-3.5 text-white lg:w-4 lg:h-4 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                                        </svg>
                                    </li>
                                @else
                                    <li class="flex mb-6 w-full items-center justify-center">
                                        <span class="flex items-center justify-center w-10 h-10 text-white rounded-full lg:h-12 lg:w-12 dark:bg-slate-400 shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash-stack" viewBox="0 0 16 16">
                                                <path d="M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1zm7 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4"/>
                                                <path d="M0 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V7a2 2 0 0 1-2-2z"/>
                                            </svg>
                                        </span>
                                    </li>
                                @endif
                            </div>
                            <span class="flex items-center justify-center">
                                Order Paid
                            </span>
                        </div>
                        <div class="w-full">
                        @if($order->status == 'intransit' || $order->status == 'received' || $order->status == 'completed')
                                <li class="flex mb-6 w-full items-center justify-center">
                                        <span class="flex items-center justify-center w-10 h-10 text-white rounded-full lg:h-12 lg:w-12 dark:bg-orange-400 shrink-0">
                                        <svg class="w-3.5 h-3.5 text-white lg:w-4 lg:h-4 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                                        </svg>
                                    </li>
                                @else
                                    <li class="flex mb-6 w-full items-center justify-center">
                                        <span class="flex items-center justify-center w-10 h-10 text-white rounded-full lg:h-12 lg:w-12 dark:bg-slate-400 shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16">
                                        <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5zm1.294 7.456A2 2 0 0 1 4.732 11h5.536a2 2 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456M12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2"/>
                                        </svg>
                                        </span>
                                    </li>
                                @endif
                            <span class="flex items-center justify-center">
                                Order Shipped
                            </span>
                        </div>
                        <div class="w-full">
                        @if($order->status == 'received' || $order->status == 'completed')
                                <li class="flex mb-6 w-full items-center justify-center">
                                        <span class="flex items-center justify-center w-10 h-10 text-white rounded-full lg:h-12 lg:w-12 dark:bg-orange-400 shrink-0">
                                        <svg class="w-3.5 h-3.5 text-white lg:w-4 lg:h-4 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                                        </svg>
                                    </li>
                                @else
                                    <li class="flex mb-6 w-full items-center justify-center">
                                        <span class="flex items-center justify-center w-10 h-10 text-white rounded-full lg:h-12 lg:w-12 dark:bg-slate-400 shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-inbox" viewBox="0 0 16 16">
                                        <path d="M4.98 4a.5.5 0 0 0-.39.188L1.54 8H6a.5.5 0 0 1 .5.5 1.5 1.5 0 1 0 3 0A.5.5 0 0 1 10 8h4.46l-3.05-3.812A.5.5 0 0 0 11.02 4zm9.954 5H10.45a2.5 2.5 0 0 1-4.9 0H1.066l.32 2.562a.5.5 0 0 0 .497.438h12.234a.5.5 0 0 0 .496-.438zM3.809 3.563A1.5 1.5 0 0 1 4.981 3h6.038a1.5 1.5 0 0 1 1.172.563l3.7 4.625a.5.5 0 0 1 .105.374l-.39 3.124A1.5 1.5 0 0 1 14.117 13H1.883a1.5 1.5 0 0 1-1.489-1.314l-.39-3.124a.5.5 0 0 1 .106-.374z"/>
                                        </svg>
                                        </span>
                                    </li>
                                @endif
                            <span class="flex items-center justify-center">
                                Order Received
                            </span>
                        </div>
                        <div class="w-full">
                        @if($order->status == 'completed')
                                <li class="flex mb-6 w-full items-center justify-center">
                                        <span class="flex items-center justify-center w-10 h-10 text-white rounded-full lg:h-12 lg:w-12 dark:bg-orange-400 shrink-0">
                                        <svg class="w-3.5 h-3.5 text-white lg:w-4 lg:h-4 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                                        </svg>
                                    </li>
                                @else
                                    <li class="flex mb-6 w-full items-center justify-center">
                                        <span class="flex items-center justify-center w-10 h-10 text-white rounded-full lg:h-12 lg:w-12 dark:bg-slate-400 shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                        <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z"/>
                                        </svg>
                                        </span>
                                    </li>
                                @endif
                            <span class="flex items-center justify-center">
                                Order Completed
                            </span>
                        </div>
                    </ol>
                </div>
            </div>
            @if($order->status == 'completed')
            <div class="mx-auto border-b-2 my-2 border-dotted border-slate-100 p-2 bg-amber-50 drop-shadow-md">
                <header class="mx-3 flex justify-between item-center">
                    <div class="pt-2">
                        <h3>Thank you for shopping!</h3>
                    </div>
                </header>
            </div> 
            @endif
            <div class="border-b-2 border-dotted border-slate-100 bg-white drop-shadow-md ">
                <header class="flex justify-between mx-4 p-2 border-b-2">
                    <div class="text-xl my-4 font-bold">
                        <h3>Delivery Address</h3>
                    </div>
                    <div class="text-s my-4">
                        <h3>DELIVERY ID: <span class="font-bold">{{$orderReferenceId}}</span></h3>
                    </div>
                </header>

                <div class="flex">
                    <div class="mx-6 mb-1 w-4/12 border-r-2 pr-6">
                        <div class="mb-4 mt-4">
                            <h4>{{ $userFirstName }} {{ $userLastName }}</h4>
                        </div>
                        <div class="my-2 text-xs text-black">
                            <h4>+63 {{ $userPhoneNumber }}</h4>
                        </div>
                        <div class="my-2 text-xs text-black">
                        <p>
                        <p class="w-2/3">{{ $userAddress }}</p>
                        </p>
                        </div>
                    </div>

                    <div class="mx-2 p-5">
                        <ol class="relative text-sm">
                            @if($order->status == 'scheduled' || $order->status == 'preparing' || $order->status == 'intransit' || $order->status == 'received' || $order->status == 'completed')
                                <li class="mb-10 ms-6 flex">
                                    <time class="block text-sm font-normal leading-none text-black dark:text-black mt-1">11/6/2023</time>
                                    <div class="ml-4">
                                        <h3 class="font-bold text-black opacity-50">Preparing Order</h3>
                                        <p class="font-normal text-black opacity-50">Order is being packed</p>
                                    </div>
                                </li>
                            @endif

                            @if($order->status == 'scheduled' || $order->status == 'intransit' || $order->status == 'received' || $order->status == 'completed')
                                <li class="mb-10 ms-6 flex">
                                    <time class="block mb-2 text-sm font-normal leading-none text-black dark:text-black mt-1">11/6/2023</time>
                                    <div class="ml-4">
                                        <h3 class="font-bold text-black opacity-50">Order Scheduled</h3>
                                        <p class="font-normal text-black opacity-50">Order will be shipped out on (DATE)</p>
                                    </div>
                                </li>
                            @endif

                            @if($order->status == 'intransit'|| $order->status == 'received' || $order->status == 'completed')
                                <li class="mb-10 ms-6 flex">
                                    <time class="block text-sm font-normal leading-none text-black dark:text-black mt-1">11/6/2023</time>
                                    <div class="ml-4">
                                        <h3 class="font-bold text-black opacity-50">In Transit</h3>
                                        <p class="font-normal text-black opacity-50">Parcel is out for delivery</p>
                                    </div>
                                </li>
                            @endif

                            @if($order->status == 'received' || $order->status == 'completed')
                                <li class="mb-10 ms-6 flex">
                                    <time class="block text-sm font-normal leading-none text-black dark:text-black mt-1">11/6/2023</time>
                                    <div class="ml-4">
                                        <h3 class="font-bold text-orange-400">Delivered</h3>
                                        <p class="font-normal text-orange-400">Parcel has been delivered</p>
                                    </div>
                                </li>
                            @endif

                            @if($order->status == 'cancelled')
                                <li class="mb-10 ms-6 flex">
                                    <time class="block text-sm font-normal leading-none text-black dark:text-black mt-1">11/6/2023</time>
                                    <div class="ml-4">
                                        <h3 class="font-bold text-red-400">Cancelled</h3>
                                        <p class="font-normal text-red-400">Order has been cancelled.</p>
                                    </div>
                                </li>
                            @endif
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
                        <img class="h-24 w-24" src="{{ asset('./products/'.$orderItem->image )}}" alt="{{ $orderItem->sku }} avatar">
                    </div>
                    
                    <div>
                        <h3 class="mb-2">{{$orderItem->name}}</h3>
                        <h1 class="text-xs mb-2">{{$orderItem->category}}</h1>
                        <h1 class="text-xs mb-2">x{{$orderItem->quantity}}</h1>
                    </div>
                    <div class="flex items-center ml-auto mr-4 text-orange-600">
                        <h3>₱{{ $orderItem->price * $orderItem->quantity }}</h3>
                    </div>
                </div>
                @php
                    $totalPrice += $orderItem->price * $orderItem->quantity;
                @endphp
                
                @php
                    $existingRating = \App\Models\Rating::where('product_id', $orderItem->product_id)
                                                        ->where('order_id', $orderItem->order_id)
                                                        ->where('user_id', auth()->id())
                                                        ->first();
                @endphp
                @if($order->status == 'completed')
                    @if(!$existingRating)
                        <form method="POST" action="{{ route('ratings.add') }}">
                            @csrf
                            <input type="hidden" name="product_id" value="{{$orderItem->product_id}}">
                            <input type="hidden" name="order_id" value="{{$orderItem->order_id}}">
                            <div class="overflow-x-auto">
                                <div class="mx-auto border-slate-100 p-2 bg-amber-50 drop-shadow-md">
                                    <header class="mx-3 flex flex-col lg:flex-row justify-between items-center">
                                        <div class="mb-4 lg:mb-0">
                                            <div class="flex items-center whitespace-nowrap">
                                                <h3 class="inline-block mr-2">Review This Product</h3>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="orange" class="bi bi-star-fill mr-2" viewBox="0 0 16 16" style="width: 32px; height: 32px;">
                                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                </svg>
                                                <select name="ratingStar" id="ratingStar" class="w-1/2 lg:w-1/6 appearance-none bg-transparent border-none outline-none mr-2 focus:border-none">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                                <input type="text" name="reviewText" id="reviewText" class="w-full lg:w-auto border border-gray-300 rounded-md px-3 py-2 focus:outline-none">
                                            </div>
                                        </div>
                                        <div>
                                            <button type="submit" class="w-full lg:w-48 h-18 bg-orange-600 p-2 text-white">Confirm Rating</button>
                                        </div>
                                    </header>
                                </div>
                            </div>
                        </form>
                    @else
                        <p class="ml-6 my-2">You have already rated this product in this order.</p>
                    @endif
                @endif
                <div class="p-6 flex justify-end">
                    <a href="" class="w-28 h-18 bg-orange-600 p-2 text-white text-xs flex items-center justify-center">View Product</a>
                </div>
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
    </div>
</body>
</html>