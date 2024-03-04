<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin > Inventories</title>
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
                                <p class="select-none text-black hover:text-rfg-accent ml-1 md:ml-2 text-sm font-medium">Inventories</p>
                                </div>
                            </li>
                            </ol>
                        </nav>
                        {{-- Navigation End --}}

                        <h1 class="text-xl sm:text-2xl font-semibold text-black">All Inventories</h1>
                    </div>

                    <div class="sm:flex">
                        <div class="hidden sm:flex items-center sm:divide-x sm:divide-gray-100 mb-3 sm:mb-0">

                            <label for="searchInput" class="sr-only">Search</label>
                            <div class="mt-1 relative lg:w-64 xl:w-96">
                                <input type="text" name="searchInput" id="searchInput" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="Search for Inventories">
                            </div>

                        </div>

                        <div class="flex items-center space-x-2 sm:space-x-3 ml-auto">
                            <button data-modal-target="add-inventory-modal" data-modal-toggle="add-inventory-modal"class="w-1/2 text-white bg-orange-500 hover:bg-orange-600 focus:ring-2 focus:ring-red-200 font-medium inline-flex items-center justify-center rounded-lg text-sm px-3 py-2 text-center sm:w-auto">
                                <svg class="-ml-1 mr-2 h-6 w-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                                Add Inventory
                            </button>
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
                                Add new inventory
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
            const fetch_data = (page, status, search_term) => {
                if(status === undefined){
                    status = "";
                }
                if(search_term === undefined){
                    search_term = "";
                }
                $.ajax({ 
                    url:"/admin/inventory/?page="+page+"&status="+status+"&search_term="+search_term,
                    data: {
                        page: page,
                        status: status,
                        search_term: search_term,
                    },
                    success:function(data){
                        $('#datatable').html('');
                        $('#datatable').html(data);
                        
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                })
            }
        
            $('body').on('keyup', '#searchInput', function(){
                var status = $('#status').val();
                var search_term = $('#searchInput').val();
                var page = $('#hidden_page').val();
                fetch_data(page, status, search_term);
            });
        
            $('body').on('change', '#status', function(){
                var status = $('#status').val();
                var search_term = $('#searchInput').val();
                var page = $('#hidden_page').val();
                fetch_data(page, status, search_term);
            });
        
            $('body').on('click', '.pager a', function(event){
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                $('#hidden_page').val(page);
                var search_term = $('#searchInput').val();
                var status = $('#status').val();
                fetch_data(page, status, search_term);
            });

        });
    </script>

</body>
</html>