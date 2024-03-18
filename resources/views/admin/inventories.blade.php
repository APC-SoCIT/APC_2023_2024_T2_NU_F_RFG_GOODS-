<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RFG - Admin Inventories</title>
    <link rel="icon" href="/Img/logo1.png" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css"  rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-gray-100">
    @include('admin.partials.admin-sidebar')

    <div class="p-4 sm:ml-64">
        <div class="mt-16">

            <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

            <script>
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            </script>

            <div class="p-4 block sm:flex items-center justify-between border-b border-white lg:mt-1.5">
                <div class="mb-1 w-full">

                    <div class="mb-4">
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
                                <svg class="w-6 h-6 text-black" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                <p class="select-none text-black hover:text-rfg-accent ml-1 md:ml-2 text-sm font-medium">Stock Transactions</p>
                                </div>
                            </li>
                            </ol>
                        </nav>

                        <h1 class="text-xl sm:text-2xl font-semibold text-black">All Stock Transactions</h1>
                    </div>

                    {{-- Navigation End --}}

                    <div class="sm:normal">
                        <div class="flex flex-col sm:flex-row items-center sm:divide-x sm:divide-gray-100 mb-3 sm:mb-0">
                            <div class="mb-3 sm:mb-0 sm:mr-2 w-full">
                                <div class="px-2 relative sm:w-64 xl:w-96">
                                    <input type="text" name="searchInput" id="searchInput" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="Search for Inventories">
                                </div>
                            </div>

                            <div class="mb-3 sm:mb-0 px-2 w-full">
                                <select name="sort_by" id="sort_by" class="w-full rounded-lg pl-2 border-1 border-gray-300 p-2 box-sizing-content">
                                    <option value="default" disabled selected hidden>SORT BY:</option>
                                    <option value="default">NONE</option>
                                    <option value="sort_by_name_asc">NAME (A-Z)</option>
                                    <option value="sort_by_name_desc">NAME (Z-A)</option>
                                    <option value="sort_by_quantity_asc">QUANTITY (LOW TO HIGH)</option>
                                    <option value="sort_by_quantity_desc">QUANTITY (HIGH TO LOW)</option>
                                </select>
                            </div>

                            <div class="mb-3 sm:mb-0 px-2 w-full">
                                <select name="filter_transaction" id="filter_transaction" class="w-full rounded-lg pl-2 border-1 border-gray-300 focus:ring-blue-500 p-2 box-sizing-content">
                                    <option value="default">TRANSACTION TYPE:</option>
                                    <option value="1">RECEIVED</option>
                                    <option value="0">SOLD</option>
                                </select>
                            </div>

                            <div class="mb-3 sm:mb-0 px-2 w-full">
                                <select name="filter_year" id="filter_year" class="w-full rounded-lg pl-2 border-1 border-gray-300 focus:ring-blue-500 p-2 box-sizing-content">
                                    <option value="default">Select Year</option>
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                </select>
                            </div>

                            <div class="mb-3 sm:mb-0 px-2 w-full">
                                <select name="filter_month" id="filter_month" class="w-full rounded-lg pl-2 border-1 border-gray-300 focus:ring-blue-500 p-2 box-sizing-content">
                                    <option value="">Select Month</option>
                                    <option value="1">January</option>
                                    <option value="2">February</option>
                                    <option value="3">March</option>
                                    <option value="4">April</option>
                                    <option value="5">May</option>
                                    <option value="6">June</option>
                                    <option value="7">July</option>
                                    <option value="8">August</option>
                                    <option value="9">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>
                            </div>

                            <div class="mb-3 sm:mb-0 px-2 w-full">
                                <select name="filter_day" id="filter_day" class="w-full rounded-lg pl-2 border-1 border-gray-300 focus:ring-blue-500 p-2 box-sizing-content">
                                    <option value="">Select Day</option>
                                    <option value="01">1</option>
                                    <option value="02">2</option>
                                    <option value="03">3</option>
                                    <option value="04">4</option>
                                    <option value="05">5</option>
                                    <option value="06">6</option>
                                    <option value="07">7</option>
                                    <option value="08">8</option>
                                    <option value="09">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
                                </select>
                            </div>
<div class="px-2">
                            <button data-modal-target="add-inventory-modal" data-modal-toggle="add-inventory-modal"class="w-full text-white bg-orange-500 hover:bg-orange-600 focus:ring-2 focus:ring-red-200 font-medium inline-flex items-center justify-center rounded-lg text-sm px-3 py-2 text-center sm:w-auto whitespace-nowrap">
                                <svg class="-ml-1 mr-2 h-6 w-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                                Add Stock Transaction
                            </button>
</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-col ">
                <div id="datatable"class="overflow-x-auto">
                    @include('admin.inventories-table')
                </div>
            </div>
        
            <!-- Add Inventory Modal -->
            <div class="hidden overflow-x-hidden overflow-y-auto fixed top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center h-modal sm:h-full" id="add-inventory-modal">
                <div class="relative w-full max-w-2xl px-4 h-full md:h-auto">
                    <!-- Modal content -->
                    <div class="bg-white rounded-lg shadow relative">
                        <!-- Modal header -->
                        <div class="flex items-start justify-between p-5 border-b rounded-t">
                            <h3 class="text-xl font-semibold">
                                Add New Stock Transaction
                            </h3>
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="add-inventory-modal">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-6 space-y-6">
                            <form method="post" action="{{route('inventory.save')}}" enctype="multipart/form-data">
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
                                        <select name="product_id" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="" required>
                                            @forelse ($products as $product)
                                                <option value="{{$product->id}}">{{$product->sku}} | {{$product->name}}</option>
                                            @empty
                                                <option value="0" disabled>Select Product</option>
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="is_received" class="text-sm font-medium text-gray-900 block mb-2">Transaction Type</label>
                                        <select name="is_received" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="" required>
                                                <option value="1" >Received</option>
                                                <option value="0" >Sold</option>
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
                            <button class="text-white bg-orange-500 hover:bg-orange-600 focus:ring-2 focus:ring-red-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="submit">Add inventory</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        $(document).ready(function(){
            const showLoadingScreen = () => {
                $('#loadingScreen').show();
            };

            const hideLoadingScreen = () => {
                $('#loadingScreen').hide();
            };

            const fetch_data = (page, search_term, sort_by, filter_transaction, filter_year, filter_month, filter_day) => {
                showLoadingScreen();
                if(search_term === undefined){search_term = "";}
                if(sort_by === undefined){sort_by = "";}
                if(filter_transaction === undefined){filter_transaction = "";}
                if(filter_year === undefined){filter_year = "";}
                if(filter_month === undefined){filter_month = "";}
                if(filter_day === undefined){filter_day = "";}
                $.ajax({ 
                    url:"/admin/inventories/?",
                    data: {
                        page: page,
                        search_term: search_term,
                        sort_by: sort_by, 
                        filter_transaction: filter_transaction, 
                        filter_year: filter_year,
                        filter_month: filter_month,
                        filter_day: filter_day
                    },
                    beforeSend: function(){
                        showLoadingScreen();
                    },
                    success:function(data){
                        $('#datatable').html(data);
                    },
                    complete: function(){
                        hideLoadingScreen();
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                        console.error(error);
                    }
                });
            };
        $('body').on('change', '#sort_by, #filter_transaction, #filter_year, #filter_month, #filter_day', function(){
            var search_term = $('#searchInput').val();
            var page = $('#hidden_page').val();
            var sort_by = $('#sort_by').val();
            var filter_transaction = $('#filter_transaction').val();
            var filter_year = $('#filter_year').val();
            var filter_month = $('#filter_month').val();
            var filter_day = $('#filter_day').val();
            fetch_data(page, search_term, sort_by, filter_transaction, filter_year, filter_month, filter_day);
        });

        $('body').on('keyup', '#searchInput', function(){
            var search_term = $(this).val();
            var page = $('#hidden_page').val();
            var sort_by = $('#sort_by').val();
            var filter_transaction = $('#filter_transaction').val();
            var filter_year = $('#filter_year').val();
            var filter_month = $('#filter_month').val();
            var filter_day = $('#filter_day').val();
            fetch_data(page, search_term, sort_by, filter_transaction, filter_year, filter_month, filter_day);
        });

        $('body').on('click', '.pager a', function(event){
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            $('#hidden_page').val(page);
            var search_term = $('#searchInput').val();
            var sort_by = $('#sort_by').val();
            var filter_transaction = $('#filter_transaction').val();
            var filter_year = $('#filter_year').val();
            var filter_month = $('#filter_month').val();
            var filter_day = $('#filter_day').val();
            fetch_data(page, search_term, sort_by, filter_transaction, filter_year, filter_month, filter_day);
        });
    });
</script>

</body>
</html>