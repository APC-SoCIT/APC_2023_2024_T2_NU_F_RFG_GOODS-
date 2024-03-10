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
        <header class="flex justify-between border-2 border-slate-100 p-2">
            <div class="flex items-center">
                <svg class="mx-1 w-3 h-3 text-gray-800 dark:text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 1 1.3 6.326a.91.91 0 0 0 0 1.348L7 13"/>
                </svg>
                <h3>Back</h3>
            </div>
            <div class="flex items-center">
                <h3 class="mx-2">ORDER ID:IloveuangelXOXO@gmail.com_load_typelib</h3>
                <span>|</span>
                <h3 class="text-red-300 mx-2">ORDER COMPLETED</h3>
            </div>
        </header>
        <div class="border-2 border-slate-100 p-2 py-6 px-6">
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
        <div class="mx-auto border-2 border-slate-100 p-2 bg-amber-100">
            <header class="mx-3 flex justify-between item-center">
                <div class="pt-2">
                    <h3>Thank you for shopping!</h3>
                </div>
                <div>
                    <button class="w-48 h-18 bg-orange-600 p-2 text-white">Buy Again</button>
                </div>
            </header>
        </div>
        <div class="border-2 border-slate-100 p-2 flex justify-end bg-amber-100">
            <div class="mr-3">
                <div class="mb-6">
                    <button class="w-48 h-18 bg-neutral-100 border-2 p-2 border-slate-200 text-black">Contact Seller</button>
                </div>
                <div class="mt-6">
                    <button class="w-48 h-18 bg-neutral-100 border-2 p-2 border-slate-200 text-black">View E-Invoice</button>
                </div>
            </div>
        </div>
        <div class="border-2 border-slate-100">
            <header class="flex justify-between mx-4 my-4 p-2">
                <div class="text-xl">
                    <h3>Delivery Address</h3>
                </div>
                <div>
                    <h3>DELIVERY ID:5169012964926264</h3>
                </div>
            </header>
            <div class="flex">

                <div class="mx-6 mb-1 w-4/12 border-r-2 pr-6">
                    <div>
                        <h4>Angel Tidon</h4>
                    </div>
                    <div class="my-2 text-gray-400">
                        <h4>(+63) 9772593898</h4>
                    </div>
                    <div class="my-2 text-gray-400">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
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
                                <h3>Delivered</h3>
                                <p>Parcel has been delivered</p>
                                <p>Parcel has been delivered</p>
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
                                <h3>Delivered</h3>
                                <p>Parcel has been delivered</p>
                                <p>Parcel has been delivered</p>
                            </div>
                        </li>
                        <li class="ms-6 flex">
                            <span class="absolute flex items-center justify-center w-6 h-6 text-white rounded-full -start-3 ring-8 ring-white dark:ring-slate-400 dark:bg-slate-400">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                                    <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10"/>
                                    <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                                </svg>
                            </span>
                            <time class="block mb-2 text-sm font-normal leading-none text-black dark:text-black mt-1">11/6/2023</time>
                            <div class="ml-4">
                                <h3>Delivered</h3>
                                <p>Parcel has been delivered</p>
                                <p>Parcel has been delivered</p>
                            </div>
                        </li>
                        <li class="ms-6 flex">
                            <span class="absolute flex items-center justify-center w-6 h-6 text-white rounded-full -start-3 ring-8 ring-white dark:ring-slate-400 dark:bg-slate-400">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                                    <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10"/>
                                    <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                                </svg>
                            </span>
                            <time class="block mb-2 text-sm font-normal leading-none text-black dark:text-black mt-1">11/6/2023</time>
                            <div class="ml-4">
                                <h3>Delivered</h3>
                                <p>Parcel has been delivered</p>
                                <p>Parcel has been delivered</p>
                            </div>
                        </li>
                    </ol>
                </div>

            </div>
        </div>
</div>
</body>
</html>