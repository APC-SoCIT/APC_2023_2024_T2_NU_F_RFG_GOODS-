<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RFG - Admin Deliveries</title>
    <link rel="icon" href="/Img/logo1.png" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css"  rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    @include('admin.partials.admin-sidebar')

    <div class="p-4 sm:ml-64">
        <div class="mt-16">
            <div class="p-4 block sm:flex items-center justify-between lg:mt-1.5">
                        <div class="mb-1 w-full">
                            <div class="">
                                {{-- Navigation Start --}}
                                <nav class="flex mb-5" aria-label="Breadcrumb">
                                    <ol class="inline-flex items-center space-x-1 md:space-x-2">
                                    <li class="inline-flex items-center">
                                        <a href="/" class="text-black hover:text-rfg-accent inline-flex items-center">
                                        <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                                        Dashboard
                                        </a>
                                    </li>
                                    <li>
                                        <div class="flex items-center">
                                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                        <p class="select-none text-black hover:text-rfg-accent ml-1 md:ml-2 text-sm font-medium">Delivery</p>
                                        </div>
                                    </li>
                                    </ol>
                                </nav>
                                {{-- Navigation End --}}
                                <h1 class="text-xl sm:text-2xl font-semibold text-black">Current Deliveries</h1>
                            </div>
                        </div>
                </div>

            <div class="flex flex-col ">
                <div id="datatable">
                    @include('admin.deliveries-table')
                </div>
            </div>





































        </div>
    </div>


</body>
</html>