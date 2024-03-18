<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RFG - Admin Orders</title>
    <link rel="icon" href="/Img/logo1.png" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css"  rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-gray-100">
    @include('admin.partials.admin-sidebar')

    <div id="toast-cancel" class="fixed hidden items-center w-full max-w-xs p-4 space-x-4 text-white bg-orange-500 divide-x rtl:divide-x-reverse divide-gray-200 rounded-lg shadow right-5 bottom-5" role="alert">
        <div class="text-sm font-bold">Press the button again to cancel the order.</div>
    </div>

    <div class="p-4 sm:ml-64">
        <div class="mt-16">

            <div class="p-4 block sm:flex items-center justify-between border-b border-white lg:mt-1.5">
                <div class="mb-1 w-full">
                    {{-- Navigation Start --}}

                    <div class="mb-4">
                        
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
                                <p class="select-none text-black hover:text-rfg-accent ml-1 md:ml-2 text-sm font-medium">Orders</p>
                                </div>
                            </li>
                            </ol>
                        </nav>
                        <h1 class="text-xl sm:text-2xl font-semibold text-black">All Orders</h1>
                    </div>

                    {{-- Navigation End --}}

                    <div class="sm:normal">
                        <div class="flex flex-col sm:flex-row items-center sm:divide-x sm:divide-gray-100 mb-3 sm:mb-0">
                            <div class="mb-3 sm:mb-0 sm:mr-2 w-full">
                                <div class="relative sm:w-64 xl:w-96">
                                    <input type="text" name="searchInput" id="searchInput" class="bg-gray-50 border-1 border-gray-300 focus:ring-0 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5" placeholder="Search for Order ID/Customer Names">
                                </div>
                            </div>

                            <div class="mb-3 sm:mb-0 sm:pl-2 w-full">
                                <select name="sort_by" id="sort_by" class="w-full rounded-lg pl-2 border-1 border-gray-300 p-2 box-sizing-content">
                                    <option value="default" disabled selected hidden>SORT BY:</option>
                                    <option value="default">NONE</option>
                                    <option value="sort_by_last_name_asc">LAST NAME (A-Z)</option>
                                    <option value="sort_by_last_name_desc">LAST NAME (Z-A)</option>
                                    <option value="sort_by_first_name_asc">FIRST NAME (A-Z)</option>
                                    <option value="sort_by_first_name_desc">FIRST NAME (Z-A)</option>
                                    <option value="sort_by_price_asc">PRICE (LOW TO HIGH)</option>
                                    <option value="sort_by_price_desc">PRICE (HIGH TO LOW)</option>
                                    <option value="sort_by_date_upd_asc">DATE UPDATED (OLDEST TO LATEST)</option>
                                    <option value="sort_by_date_upd_desc">DATE UPDATED (LATEST TO OLDEST)</option>
                                    <option value="sort_by_date_asc">DATE ADDED (OLDEST TO LATEST)</option>
                                    <option value="sort_by_date_desc">DATE ADDED (LATEST TO OLDEST)</option>
                                </select>
                            </div>

                            <div class="mb-3 sm:mb-0 sm:pl-2 w-full">
                                <select name="payment_method" id="payment_method" class="w-full rounded-lg pl-2 border-1 border-gray-300 focus:ring-blue-500 p-2 box-sizing-content">
                                    <option value="default" disabled selected hidden>PAYMENT METHOD:</option>
                                    <option value="default">NONE</option>
                                    <option value="cod" >COD</option>
                                    <option value="paymaya" >PAYMAYA</option>

                                </select>
                            </div>

                            @php
                                $statusMap = [
                                    'canceled',
                                    'processing',
                                    'confirmed',
                                    'preparing',
                                    'scheduled',
                                    'intransit',
                                    'received',
                                    'torate',
                                    'completed'
                                ];
                            @endphp

                            <div class="mb-3 sm:mb-0 sm:pl-2 w-full">
                                <select name="filter_status" id="filter_status" class="w-full rounded-lg pl-2 border-1 border-gray-300 focus:ring-blue-500 p-2 box-sizing-content">
                                    <option value="default" disabled selected hidden>STATUS:</option>
                                    <option value="default">NONE</option>
                                    @foreach($statusMap as $status)
                                        <option value="{{$status}}">
                                            @if ($status == 'torate')
                                                TO RATE
                                            @elseif ($status == 'intransit')
                                                IN TRANSIT
                                            @else
                                                {{ strtoupper($status) }}
                                            @endif
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <a href="">
                
            </a>

            <div class="flex flex-col">
                <div id="datatable">
                    @include('admin.orders-table')
                    <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
                </div>
            </div>

            <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
            <script>
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            </script>
            <script>
                $(document).ready(function() {
                    const showLoadingScreen = () => {
                        $('tr').css('opacity', 0.5);
                    };

                    const hideLoadingScreen = () => {
                        $('tr').css('opacity', 1);
                    };

                    const fetch_data = (page, search_term, filter_status, sort_by, payment_method) => {
                        showLoadingScreen();
                        if(status === undefined){status = "";}
                        if(filter_status === undefined){filter_status = "";} 
                        if(search_term === undefined){search_term = "";}
                        if(sort_by === undefined){sort_by = "";}
                        if(payment_method === undefined){payment_method = "";}
                        $.ajax({
                            url:"/admin/orders/?",
                            data: {
                                page: page, 
                                search_term: search_term, 
                                filter_status: filter_status, 
                                sort_by: sort_by, 
                                payment_method: payment_method,
                                type : 'filters'
                            },
                            beforeSend: function(){
                                showLoadingScreen();
                            },
                            success:function(data){
                                const tempContainer = document.createElement('div');
                                tempContainer.innerHTML = data;

                                const viewButton = tempContainer.querySelectorAll('#view-order-button');
                                const backButton = tempContainer.querySelectorAll('#status-back');
                                const nextButton = tempContainer.querySelectorAll('#status-next');

                                viewButton.forEach(function (button) {
                                    button.addEventListener('click', function() {
                                        const orderData = JSON.parse(button.getAttribute('data-order'));
                                        var page = $('#hidden_page').val();

                                        const showLoadingScreen = () => {
                                                $('tr').css('opacity', 0.5);
                                            };

                                        const hideLoadingScreen = () => {
                                            $('tr').css('opacity', 1);
                                        };

                                        console.log(orderData);
                                        gotoorderitem(page, orderData)

                                    });
                                });

                                var statusMapNext = {
                                    'canceled': 'processing',
                                    'processing': 'confirmed',
                                    'confirmed': 'preparing',
                                    'preparing': 'scheduled',
                                    'scheduled': 'intransit',
                                    'intransit': 'received',
                                    'received': 'torate',
                                    'torate': 'completed',
                                    'completed': 'completed'
                                };
                                var statusMapBack = {
                                    'canceled': 'canceled', 
                                    'canceled': 'processing', 
                                    'confirmed': 'processing',
                                    'preparing': 'confirmed',   
                                    'scheduled': 'preparing',   
                                    'intransit': 'scheduled',   
                                    'received': 'intransit', 
                                    'torate': 'received',
                                    'completed': 'torate'
                                };

                                const showLoadingScreen = () => {
                                    $('tr').css('opacity', 0.5);
                                };

                                const hideLoadingScreen = () => {
                                    $('tr').css('opacity', 1);
                                };

                                var nextButtonArray = Array.from(nextButton);
                                var backButtonArray = Array.from(backButton);

                                function updateStatusAndFetch(orderId, oldStatus, newStatus) {
                                    var statusText = $('span[data-order-id="' + orderId + '"]');
                                    fetchforupdate(orderId, newStatus, statusText);
                                    1111
                                    // Update the data-status attribute of nextButton and backButton
                                    nextButtonArray.filter(function(button) {
                                        return $(button).data('order-id') === orderId;
                                    }).forEach(function(button) {
                                        $(button).data('status', newStatus);
                                    });

                                    backButtonArray.filter(function(button) {
                                        return $(button).data('order-id') === orderId;
                                    }).forEach(function(button) {
                                        $(button).data('status', newStatus);
                                    });
                                }

                                var tries = 0;

                                $('#datatable').on('click', '#status-next', function() {
                                    const orderId = $(this).data('order-id');
                                    const oldStatus = $(this).data('status');
                                    const newStatus = statusMapNext[oldStatus] || 'completed';
                                    updateStatusAndFetch(orderId, oldStatus, newStatus);
                                });

                                $('#datatable').on('click', '#status-back', function() {
                                    const orderId = $(this).data('order-id');
                                    const oldStatus = $(this).data('status');
                                    const newStatus = statusMapBack[oldStatus] || 'processing';

                                    alert(orderId);

                                    if (newStatus == 'canceled') {
                                        if (tries == 0) {
                                            showDeleteToast();
                                            tries = 1;
                                        } else if (tries == 1) {
                                            updateStatusAndFetch(orderId, oldStatus, newStatus);
                                            tries = 0;
                                        } else {
                                            tries = 0;
                                        }
                                    } else {
                                        updateStatusAndFetch(orderId, oldStatus, newStatus);
                                    }
                                });

                                function showDeleteToast() {
                                    var toast = document.getElementById('toast-cancel');
                                    toast.classList.remove('hidden');
                                    toast.classList.add('flex');

                                    setTimeout(function() {
                                        toast.classList.add('hidden');
                                        toast.classList.remove('flex');
                                    }, 5000); // 5000 milliseconds = 5 seconds
                                }

                                $('#datatable').empty();
                                $('#datatable').html(tempContainer);
                            },
                            complete: function(){
                                hideLoadingScreen();
                            },
                            error: function (xhr, status, error) {
                                console.error(xhr.responseText);
                                console.error(error);
                            }
                        });

                    }

                    $('body').on('click', '.pager a', function(event){
                        event.preventDefault();
                        var page = $(this).attr('href').split('page=')[1];
                        $('#hidden_page').val(page);
                        var search_term = $('#searchInput').val();
                        var filter_status = $('#filter_status').val();
                        var sort_by = $('#sort_by').val();
                        var payment_method = $('#payment_method').val();
                        fetch_data(page, search_term, filter_status, sort_by, payment_method);
                    });
                    $('body').on('change', '#sort_by', function(){
                        var page = $('#hidden_page').val();
                        var search_term = $('#searchInput').val();
                        var filter_status = $('#filter_status').val();
                        var sort_by = $('#sort_by').val();
                        var payment_method = $('#payment_method').val();
                        fetch_data(page, search_term, filter_status, sort_by, payment_method);
                    });
                    $('body').on('keyup', '#searchInput', function(){
                        var page = $('#hidden_page').val();
                        var search_term = $('#searchInput').val();
                        var filter_status = $('#filter_status').val();
                        var sort_by = $('#sort_by').val();
                        var payment_method = $('#payment_method').val();
                        fetch_data(page, search_term, filter_status, sort_by, payment_method);
                    });
                    $('body').on('change', '#filter_status', function(){
                        var page = $('#hidden_page').val();
                        var search_term = $('#searchInput').val();
                        var filter_status = $('#filter_status').val();
                        var sort_by = $('#sort_by').val();
                        var payment_method = $('#payment_method').val();
                        fetch_data(page, search_term, filter_status, sort_by, payment_method);
                    });
                    $('body').on('change', '#payment_method', function(){
                        var page = $('#hidden_page').val();
                        var search_term = $('#searchInput').val();
                        var filter_status = $('#filter_status').val();
                        var sort_by = $('#sort_by').val();
                        var payment_method = $('#payment_method').val();
                        fetch_data(page, search_term, filter_status, sort_by, payment_method);
                    });
                });
            </script>

<!-- Add Order Modal Start -->
    <div class="hidden overflow-x-hidden overflow-y-auto fixed top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center h-modal sm:h-full" id="add-order-modal">
        <div class="relative w-full max-w-2xl px-4 h-full md:h-auto">
            <!-- Modal content -->
            <div class="bg-white rounded-lg shadow relative">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-5 border-b rounded-t">
                    <h3 class="text-xl font-semibold">
                        Order Details
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="add-order-modal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6">
                    <form method="post" action="{{route('orders.save')}}" enctype="multipart/form-data">
                        <div class="grid grid-cols-6 gap-6">
                            @csrf
                            @method('post')
                            <div class="col-span-6 sm:col-span-3">
                                <div class="flex">
                                    <label for="product_id" class="text-sm font-medium text-gray-900 block mb-2 mr-1">Product</label>
                                    <a href="/admin/products">
                                        <svg class="mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
                                            <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path>
                                        </svg>
                                    </a>
                                </div>
                                <select name="order" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="" required>

                                </select>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="is_received" class="text-sm font-medium text-gray-900 block mb-2">Transaction Type</label>
                                <select name="is_received" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="" required>
                                        <option value="1" >Received</option>
                                        <option value="0" >Shipped</option>
                                </select>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="quantity" class="text-sm font-medium text-gray-900 block mb-2">Quantity</label>
                                <input type="text" name="quantity" id="quantity" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="" required>
                            </div>
                        </div> 
                </div>
                <!-- Modal footer -->
                <div class="items-center p-6 border-t border-gray-200 rounded-b">
                    <button class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="submit">Add product</button>
                </div>
                </form>
            </div>
        </div>
            </div>

        </div>
    </div>
<!-- Add Order Modal End -->

<script>
    const showLoadingScreen = () => {
        $('tr').css('opacity', 0.5);
    };

    const hideLoadingScreen = () => {
        $('tr').css('opacity', 1);
    };

    function showDeleteToast() {
        var toast = document.getElementById('toast-cancel');
        toast.classList.remove('hidden');
        toast.classList.add('flex');

        setTimeout(function() {
            toast.classList.add('hidden');
            toast.classList.remove('flex');
        }, 5000); // 5000 milliseconds = 5 seconds
    }

    function updateStatusAndFetch(orderId, oldStatus, newStatus) {
        var statusText = $('span[data-order-id="' + orderId + '"]');
        fetchforupdate(orderId, newStatus, statusText);
        1111
        // Update the data-status attribute of nextButton and backButton
        nextButtonArray.filter(function(button) {
            return $(button).data('order-id') === orderId;
        }).forEach(function(button) {
            $(button).data('status', newStatus);
        });

        backButtonArray.filter(function(button) {
            return $(button).data('order-id') === orderId;
        }).forEach(function(button) {
            $(button).data('status', newStatus);
        });
    }

    $(document).ready(function () {

        const fetch_data = (page, search_term, filter_status, sort_by, payment_method) => {
            showLoadingScreen();
            if(status === undefined){status = "";}
            if(search_term === undefined){search_term = "";}
            if(sort_by === undefined){sort_by = "";}
            if(payment_method === undefined){payment_method = "";}
            $.ajax({
                url:"/admin/orders/?",
                data: {
                    page: page, 
                    search_term: search_term, 
                    status: status, 
                    sort_by: sort_by, 
                    payment_method: payment_method,
                    type : 'filters'
                },
                beforeSend: function(){
                    showLoadingScreen();
                },
                success:function(data){
                    const tempContainer = document.createElement('div');
                    tempContainer.innerHTML = data;

                    const viewButton = tempContainer.querySelectorAll('#view-order-button');
                    const backButton = tempContainer.querySelectorAll('#status-back');
                    const nextButton = tempContainer.querySelectorAll('#status-next');

                    viewButton.forEach(function (button) {
                        button.addEventListener('click', function() {
                            var page = $('#hidden_page').val();

                            const showLoadingScreen = () => {
                                    $('tr').css('opacity', 0.5);
                                };

                                const hideLoadingScreen = () => {
                                    $('tr').css('opacity', 1);
                                };

                            const fetch_data = (page, orderid) => {
                                $.ajax({
                                    url:"/admin/orders/?",
                                    data: {
                                        page: page,
                                        orderid: orderid,
                                        type: 'view',
                                    },
                                    beforeSend: function(){
                                        showLoadingScreen();
                                    },
                                    success:function(data){

                                        const tempContainer = document.createElement('div');
                                        tempContainer.innerHTML = data;

                                        $('#datatable').empty();
                                        $('#datatable').html(tempContainer);

                                    },
                                    complete: function(){
                                    hideLoadingScreen();
                                    },
                                    error: function (xhr, status, error) {
                                        console.error(xhr.responseText);
                                        console.error(error);
                                    }
                                });
                            }
                            
                            console.log(orderData);
                            fetch_data(page, orderData)

                        });
                    });

                    var statusMapNext = {
                        'canceled': 'processing',
                        'processing': 'confirmed',
                        'confirmed': 'preparing',
                        'preparing': 'scheduled',
                        'scheduled': 'intransit',
                        'intransit': 'received',
                        'received': 'torate',
                        'torate': 'completed',
                        'completed': 'completed'
                    };
                    var statusMapBack = {
                        'canceled': 'canceled', 
                        'canceled': 'processing', 
                        'confirmed': 'processing',
                        'preparing': 'confirmed',   
                        'scheduled': 'preparing',   
                        'intransit': 'scheduled',   
                        'received': 'intransit', 
                        'torate': 'received',
                        'completed': 'torate'
                    };

                    fetchforupdate = (orderId, newStatus, statusText) => {
                            $.ajax({
                                url:"/admin/orders/statusupdate?",
                                method: "PATCH",
                                data: {
                                    orderid: orderId,
                                    newstatus: newStatus,
                                    type: 'update',
                                    _token: '{{ csrf_token() }}'
                                },
                                beforeSend: function() {
                                },
                                success:function(data){
                                    statusText.text(newStatus);
                                },
                                complete: function(){
                                },
                                error: function (xhr, status, error) {
                                    console.error(xhr.responseText);
                                    console.error(error);
                                }
                            });
                        }

                    var nextButtonArray = Array.from(nextButton);
                    var backButtonArray = Array.from(backButton);

                    function updateStatusAndFetch(orderId, oldStatus, newStatus) {
                        var statusText = $('span[data-order-id="' + orderId + '"]');
                        fetchforupdate(orderId, newStatus, statusText);
                        
                        // Update the data-status attribute of nextButton and backButton
                        nextButtonArray.filter(function(button) {
                            return $(button).data('order-id') === orderId;
                        }).forEach(function(button) {
                            $(button).data('status', newStatus);
                        });

                        backButtonArray.filter(function(button) {
                            return $(button).data('order-id') === orderId;
                        }).forEach(function(button) {
                            $(button).data('status', newStatus);
                        });
                    }

                    var tries = 0;

                    $('#datatable').on('click', '#status-next', function() {
                        var orderId = $(this).data('order-id');
                        var oldStatus = $(this).data('status');
                        var newStatus = statusMapNext[oldStatus] || 'completed';
                        console.log(orderId, oldStatus, newStatus);
                        updateStatusAndFetch(orderId, oldStatus, newStatus);
                    });

                    $('#datatable').on('click', '#status-back', function() {
                        var orderId = $(this).data('order-id');
                        var oldStatus = $(this).data('status');
                        var newStatus = statusMapBack[oldStatus] || 'processing';
                        console.log(orderId, oldStatus, newStatus);
                        updateStatusAndFetch(orderId, oldStatus, newStatus);
                    });

                    $('#datatable').empty();
                    $('#datatable').html(tempContainer);
                },
                complete: function(){
                    hideLoadingScreen();
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                    console.error(error);
                }
            });

        }

        const viewButton = document.querySelectorAll('#view-order-button');
        const backButton = document.querySelectorAll('#status-back');
        const nextButton = document.querySelectorAll('#status-next');

        viewButton.forEach(function (button) {
            button.addEventListener('click', function() {
                const orderData = JSON.parse(button.getAttribute('data-order'));
                var page = $('#hidden_page').val();

                const showLoadingScreen = () => {
                        $('tr').css('opacity', 0.5);
                    };

                    const hideLoadingScreen = () => {
                        $('tr').css('opacity', 1);
                    };

                const fetch_data = (page, orderid) => {
                    $.ajax({
                        url:"/admin/orders/?",
                        data: {
                            page: page,
                            orderid: orderid,
                            type: 'view',
                        },
                        beforeSend: function(){
                            showLoadingScreen();
                        },
                        success:function(data){

                            const tempContainer = document.createElement('div');
                            tempContainer.innerHTML = data;

                            $('#datatable').empty();
                            $('#datatable').html(tempContainer);

                        },
                        complete: function(){
                        hideLoadingScreen();
                        },
                        error: function (xhr, status, error) {
                            console.error(xhr.responseText);
                            console.error(error);
                        }
                    });
                }
                
                console.log(orderData);
                fetch_data(page, orderData)

            });
        });

        $('body').on('click', '.pager a', function(event){
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            $('#hidden_page').val(page);
            var search_term = $('#searchInput').val();
            var filter_status = $('#filter_status').val();
            var sort_by = $('#sort_by').val();
            var payment_method = $('#payment_method').val();
            fetch_data(page, search_term, filter_status, sort_by, payment_method);
        });

        var statusMapNext = {
            'canceled': 'processing',
            'processing': 'confirmed',
            'confirmed': 'preparing',
            'preparing': 'scheduled',
            'scheduled': 'intransit',
            'intransit': 'received',
            'received': 'torate',
            'torate': 'completed',
            'completed': 'completed'
        };
        var statusMapBack = {
            'canceled': 'canceled', 
            'processing': 'canceled', 
            'confirmed': 'processing',
            'preparing': 'confirmed',   
            'scheduled': 'preparing',   
            'intransit': 'scheduled',   
            'received': 'intransit', 
            'torate': 'received',
            'completed': 'torate'
        };
        fetchforupdate = (orderId, newStatus, statusText) => {
                $.ajax({
                    url:"/admin/orders/statusupdate?",
                    method: "PATCH",
                    data: {
                        orderid: orderId,
                        newstatus: newStatus,
                        type: 'update',
                        _token: '{{ csrf_token() }}'
                    },
                    beforeSend: function() {
                    },
                    success:function(data){
                        statusText.text(newStatus);
                    },
                    complete: function(){
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                        console.error(error);
                    }
                });
            }

        var nextButtonArray = Array.from(nextButton);
        var backButtonArray = Array.from(backButton);

        function updateStatusAndFetch(orderId, oldStatus, newStatus) {
            var statusText = $('span[data-order-id="' + orderId + '"]');
            fetchforupdate(orderId, newStatus, statusText);
            
            // Update the data-status attribute of nextButton and backButton
            nextButtonArray.filter(function(button) {
                return $(button).data('order-id') === orderId;
            }).forEach(function(button) {
                $(button).data('status', newStatus);
            });

            backButtonArray.filter(function(button) {
                return $(button).data('order-id') === orderId;
            }).forEach(function(button) {
                $(button).data('status', newStatus);
            });
        }

        var tries = 0;

        nextButtonArray.forEach(function (button) {
            button.addEventListener('click', function() {
                var orderId = $(this).data('order-id');
                var oldStatus = $(this).data('status');
                var newStatus = statusMapNext[oldStatus] || 'completed';
                console.log(orderId, oldStatus, newStatus);
                updateStatusAndFetch(orderId, oldStatus, newStatus);
            });
        });

        backButtonArray.forEach(function (button) {
            button.addEventListener('click', function() {
                var orderId = $(this).data('order-id');
                var oldStatus = $(this).data('status');
                var newStatus = statusMapBack[oldStatus] || 'canceled';
                console.log(tries);
                if (newStatus == 'canceled') {
                    if (tries == 0) {
                        showDeleteToast();
                        tries = 1;
                    } else if (tries == 1) {
                        updateStatusAndFetch(orderId, oldStatus, newStatus);
                        tries = 0;
                    } else {
                        tries = 0;
                    }
                } else {
                    updateStatusAndFetch(orderId, oldStatus, newStatus);
                }
                
            });
        });

    });
</script>

<script>
    //View Button Ajax
    const gotoorderitem = (page, orderid) => {
        $.ajax({
            url:"/admin/orders/?",
            data: {
                page: page,
                orderid: orderid,
                type: 'view',
            },
            beforeSend: function(){
                showLoadingScreen();
            },
            success:function(data){

                const tempContainer = document.createElement('div');
                tempContainer.innerHTML = data;

                $('#datatable').empty();
                $('#datatable').html(tempContainer);

            },
            complete: function(){
            hideLoadingScreen();
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
                console.error(error);
            }
        });
    }
</script>

</body>
</html>