<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin > Products</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css"  rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-gray-100">
    @include('admin.partials.admin-sidebar')

    <div class="p-4 sm:ml-64 ">
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
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                <p class="select-none text-black hover:text-rfg-accent ml-1 md:ml-2 text-sm font-medium">Products</p>
                                </div>
                            </li>
                            </ol>
                        </nav>
                        {{-- Navigation End --}}

                        <h1 class="text-xl sm:text-2xl font-semibold text-black">All Products</h1>
                    </div>

                    <div class="sm:flex">
                        <div class="hidden sm:flex items-center sm:divide-x sm:divide-gray-100 mb-3 sm:mb-0">

                            <label for="searchInput" class="sr-only">Search</label>
                            <div class="mt-1 relative lg:w-64 xl:w-96">
                                <input type="text" name="searchInput" id="searchInput" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="Search for Products">
                            </div>

                            {{-- controls start --}}

                            {{-- <div class="flex space-x-1 pl-0 sm:pl-2 mt-3 sm:mt-0">
                                <a href="#" class="text-gray-500 hover:text-gray-900 cursor-pointer p-1 hover:bg-gray-100 rounded inline-flex justify-center">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path></svg>
                                </a>
                                <a href="#" class="text-gray-500 hover:text-gray-900 cursor-pointer p-1 hover:bg-gray-100 rounded inline-flex justify-center">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                </a>
                                <a href="#" class="text-gray-500 hover:text-gray-900 cursor-pointer p-1 hover:bg-gray-100 rounded inline-flex justify-center">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                </a>
                                <a href="#" class="text-gray-500 hover:text-gray-900 cursor-pointer p-1 hover:bg-gray-100 rounded inline-flex justify-center">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path></svg>
                                </a>
                                @if($errors->any())
                                <div class="flex items-center space-x-2">
                                    @foreach($errors->all() as $error)
                                        <div class="flex items-center">
                                            <div class="h-2.5 w-2.5 rounded-full bg-red-500 mr-2"></div>
                                            <span>{{$error}}</span>
                                        </div>
                                    @endforeach
                                </div>
                                @endif
                            </div> --}}

                            {{-- controls end --}}
                        </div>

                        <div class="flex items-center space-x-2 sm:space-x-3 ml-auto">
                            <button data-modal-target="add-product-modal" data-modal-toggle="add-product-modal"class="w-1/2 text-white bg-orange-500 hover:bg-orange-600 focus:ring-2 focus:ring-red-200 font-medium inline-flex items-center justify-center rounded-lg text-sm px-3 py-2 text-center sm:w-auto">
                                <svg class="-ml-1 mr-2 h-6 w-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                                Add Product
                            </button>
                        </div>
                    </div>

                </div>
            </div>

            <div class="flex flex-col ">
                <div id="datatable"class="overflow-x-auto">

                    @include('admin.products-table')
                    @foreach($products as $product)
                        @include('admin.partials.edit-product-modal', ['product' => $product, 'categoryList' => $categoryList])
                        @include('admin.partials.delete-product-modal', ['product' => $product, 'categoryList' => $categoryList])
                    @endforeach
                </div>
            </div>

            {{-- <x-database-layout title="Products" modal="product">
                <div class="shadow overflow-hidden">
                    <table class="table-fixed min-w-full ">
                        <thead class="bg-white text-black">
                            <tr>
                                <th scope="col" class="p-4 ">
                                    <div class="flex items-center ">
                                        <input id="checkbox-all" aria-describedby="checkbox-1" type="checkbox"
                                            class="bg-gray-50 border-gray-300 focus:ring-3 focus:ring-cyan-200 h-4 w-4 rounded">
                                        <label for="checkbox-all" class="sr-only">checkbox</label>
                                    </div>
                                </th>
                                <th scope="col" class="p-4 text-left text-xs font-medium uppercase">
                                    ID
                                </th>
                                <th scope="col" class="p-4 text-left text-xs font-medium uppercase">
                                    Image
                                </th>
                                <th scope="col" class="p-4 text-left text-xs font-medium uppercase">
                                    SKU
                                </th>
                                <th scope="col" class="p-4 text-left text-xs font-medium uppercase">
                                    Name
                                </th>
                                <th scope="col" class="p-4 text-left text-xs font-medium uppercase">
                                    Price
                                </th>
                                <th scope="col" class="p-4 text-left text-xs font-medium uppercase">
                                    Category
                                </th>
                                <th scope="col" class="p-4 text-left text-xs font-medium uppercase">
                                    Description
                                </th>
                                <th scope="col" class="p-4 text-left text-xs font-medium uppercase">
                                    Stock
                                </th>
                                <th scope="col" class="p-4 text-center text-xs font-medium uppercase whitespace-nowrap">
                                    ROP | Min | Max
                                </th>
                                <th scope="col" class="p-4">
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white text-black drop-shadow-md ">
                        </tbody>
                    </table>
                </div>
                <x-slot:pagination>
                    <div class="pt-2 bg-gray-100">
                        {!! $products->links() !!}
                    </div> 
                </x-slot>
                
            </x-database-layout> --}}

            <!-- Add Product Modal Start-->
            <div class="hidden overflow-x-hidden overflow-y-auto fixed top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center h-modal sm:h-full" id="add-product-modal">
                <div class="relative w-full max-w-2xl px-4 h-full md:h-auto">
                    <!-- Modal content -->
                    <div class="bg-white rounded-lg shadow relative">
                        <!-- Modal header -->
                        <div class="flex items-start justify-between p-5 border-b rounded-t">
                            <h3 class="text-xl font-semibold text-black">
                                Add new product
                            </h3>
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="add-product-modal">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-6 space-y-6">
                            <form method="post" action="{{route('product.save')}}" enctype="multipart/form-data">
                                <div class="grid grid-cols-6 gap-6">
                                    @csrf
                                    @method('post')
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="sku{{$product->id}}" class="text-sm font-medium text-black block mb-2">SKU</label>
                                        <input type="text" name="sku{{$product->id}}" id="sku{{$product->id}}" autocomplete="on" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="" required>
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="name" class="text-sm font-medium text-black block mb-2">Name</label>
                                        <input type="text" name="name" id="name" autocomplete="on" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="" required>
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="price" class="text-sm font-medium text-black block mb-2">Price</label>
                                        <input type="numer" name="price" id="price" autocomplete="on" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="" required>
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                        <div class="flex">
                                            <label for="category_id" class="text-sm font-medium text-black block mb-2 mr-1">Category ID</label>
                                            <a href="/admin/categories">
                                                <svg class="mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
                                                    <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path>
                                                </svg>
                                            </a>
                                        </div>
                                        <select name="category_id" class="shadow-sm bg-gray-50 border border-gray-300 text-black sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="" required>
                                            @forelse ($categoryList as $category)
                                                <option value="{{$category->id}}">{{$category->category}}</option>
                                            @empty
                                                <option value="0" disabled>Select Category</option>
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="image" class="text-sm font-medium text-black block mb-2">Image</label>
                                        <input type="file" name="image" id="image" autocomplete="on" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-[0.03rem]" placeholder="" required>
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="min_qty" class="text-sm font-medium text-black block mb-2">Minimum Quantity</label>
                                        <input type="text" name="min_qty" id="min_qty" autocomplete="on" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="" required>
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="max_qty" class="text-sm font-medium text-black block mb-2">Maximum Quantity</label>
                                        <input type="text" name="max_qty" id="max_qty" autocomplete="on" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="" required>
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="reorder_pt" class="text-sm font-medium text-black block mb-2">Reorder Point</label>
                                        <input type="text" name="reorder_pt" id="reorder_pt" autocomplete="on" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="" required>
                                    </div>
                                    <div class="col-span-6 sm:col-span-6">
                                        <label for="desc" class="text-sm font-medium text-black block mb-2">Description</label>
                                        <textarea name="desc" id="desc" rows="4" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="" required></textarea>
                                    </div>
                                </div> 
                        </div>
                        <!-- Modal footer -->
                        <div class="items-center p-6 border-t border-gray-200 rounded-b">
                            <button class="text-white bg-orange-500 hover:bg-orange-600 focus:ring-2 focus:ring-red-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="submit">Add product</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Add Product Modal End-->

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
                    url:"/admin/products/?",
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