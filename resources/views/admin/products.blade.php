<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="/Img/logo1.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RFG - Admin Products</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css"  rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-gray-100">
    @include('admin.partials.admin-sidebar')

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
                    <button type="button" 
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" 
                    data-modal-toggle="add-product-modal">
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
                                <label for="sku" class="text-sm font-medium text-black block mb-2">SKU</label>
                                <input type="text" name="sku" id="sku" autocomplete="on" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="" required>
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
                                <select name="category_id" id="category_id" class="shadow-sm bg-gray-50 border border-gray-300 text-black sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="" required>
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
                    <button class="ml-4 text-white bg-orange-500 hover:bg-orange-600 focus:ring-2 focus:ring-red-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="submit">Add product</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Add Product Modal End-->

    <!-- Edit Product Modal -->
    <div id="edit-product-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-x-hidden overflow-y-auto fixed top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center h-modal sm:h-full">
        <div class="relative w-full max-w-2xl px-4 h-full md:h-auto">
            <!-- Modal content -->
            <div class="bg-white rounded-lgshadow  relative">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-5 border-b rounded-t">
                    <h3 class="text-black text-xl font-semibold">
                        Edit product
                    </h3>
                    <button type="button" 
                    onclick="hideModal('edit-product-modal')"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6">
                    <form method="post" action="{{route('product.update')}}" enctype="multipart/form-data">
                        <div class="grid grid-cols-6 gap-6">
                            @csrf
                            @method('put')
                            <input type="text" class="hidden" name="product_id" id="product_id">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="sku" class="text-sm font-medium text-black block mb-2">SKU</label>
                                <input type="text" name="sku" id="sku" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="" required>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="name" class="text-sm font-medium text-black block mb-2">Name</label>
                                <input type="text" name="name" id="name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="" required>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="price" class="text-sm font-medium text-black block mb-2">Price</label>
                                <input type="numer" name="price" id="price" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="" required>
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
                                <select name="category_id" id="category_id" class="shadow-sm bg-gray-50 border border-gray-300 text-black sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="" required>

                                    @forelse ($categoryList as $category)
                                        <option value="{{$category->id}}">{{$category->category}}</option>
                                    @empty
                                        <option value="0" disabled>Select Category</option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="image" class="text-sm font-medium text-black block mb-2">Image</label>
                                <input type="file" name="image" id="image" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-.8" placeholder="">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="min_qty" class="text-sm font-medium text-black block mb-2">Minimum Stock</label>
                                <input type="number" name="min_qty" id="min_qty" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="" required>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="max_qty" class="text-sm font-medium text-black block mb-2">Maximum Stock</label>
                                <input type="number" name="max_qty" id="max_qty" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="" required>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="reorder_pt" class="text-sm font-medium text-black block mb-2">Reorder Point</label>
                                <input type="number" name="reorder_pt" id="reorder_pt" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="" required>
                            </div>
                            <div class="col-span-6 sm:col-span-6">
                                <label for="desc" class="text-sm font-medium text-black block mb-2">Description</label>
                                <textarea name="desc" id="desc" rows="4" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="" required></textarea>
                            </div>
                        </div> 
                </div>
                <!-- Modal footer -->
                <div class="items-center p-6 border-t border-gray-200 rounded-b">
                    <button class="text-white bg-orange-500 hover:bg-orange-600 focus:ring-2 focus:ring-red-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="submit">Save all</button>
                </div>
                    </form>
            </div>
        </div>
    </div>

    <!-- Activate Product Modal -->
    <div id="activate-product-modal" class="hidden overflow-x-hidden overflow-y-auto fixed top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center h-modal sm:h-full">
        <div class="relative w-full max-w-md px-4 h-full md:h-auto">
            <!-- Modal content -->
            <div class="bg-white rounded-lg shadow relative">
                <!-- Modal header -->
                <div class="flex justify-end p-2">
                    <button type="button" 
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" 
                    onclick="hideModal('activate-product-modal')">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 pt-0 text-center">
                    
                    <svg class="w-20 h-20 text-blue-600 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <h3 class="text-xl font-normal text-gray-500 mt-5 mb-6">Are you sure you want to activate this product?</h3>
                    <form method="post" action="{{route('product.activate')}}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <input type="text" class="hidden" name="product_id" id="product_id">
                        <button type=submit class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-base inline-flex items-center px-3 py-2.5 text-center mr-2">
                            Yes, I'm sure
                        </button>
                        <button onclick="hideModal('activate-product-modal')" class="text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-cyan-200 border border-gray-200 font-medium inline-flex items-center rounded-lg text-base px-3 py-2.5 text-center">
                            No, cancel
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Product Modal -->
    <div id="delete-product-modal" class="hidden overflow-x-hidden overflow-y-auto fixed top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center h-modal sm:h-full">
        <div class="relative w-full max-w-md px-4 h-full md:h-auto">
            <!-- Modal content -->
            <div class="bg-white rounded-lg shadow relative">
                <!-- Modal header -->
                <div class="flex justify-end p-2">
                    <button type="button" 
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" 
                    onclick="hideModal('delete-product-modal')">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 pt-0 text-center">
                    
                    <svg class="w-20 h-20 text-red-600 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <h3 class="text-xl font-normal text-gray-500 mt-5 mb-6">Are you sure you want to delete this product?</h3>
                    <form method="post" action="{{route('product.archive')}}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <input type="text" class="hidden" name="product_id" id="product_id">
                        <button type=submit class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-base inline-flex items-center px-3 py-2.5 text-center mr-2">
                            Yes, I'm sure
                        </button>
                        <button onclick="hideModal('delete-product-modal')" class="text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-cyan-200 border border-gray-200 font-medium inline-flex items-center rounded-lg text-base px-3 py-2.5 text-center">
                            No, cancel
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="p-4 sm:ml-64 ">
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
                                <p class="select-none text-black hover:text-rfg-accent ml-1 md:ml-2 text-sm font-medium">Products</p>
                                </div>
                            </li>
                            </ol>
                        </nav>
                        <h1 class="text-xl sm:text-2xl font-semibold text-black">All Products</h1>
                    </div>

                    {{-- Navigation End --}}

                    <div class="sm:normal">
                        <div class="flex flex-col sm:flex-row items-center sm:divide-x sm:divide-gray-100 mb-3 sm:mb-0">
                            <div class="mb-3 sm:mb-0 sm:mr-2 w-full">
                                <div class="relative sm:w-64 xl:w-96">
                                    <input type="text" name="searchInput" id="searchInput" class="bg-gray-50 border-1 border-gray-300 focus:ring-0 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5" placeholder="Search for Products">
                                </div>
                            </div>

                            <div class="mb-3 sm:mb-0 sm:pl-2 w-full">
                                <select name="sort_by" id="sort_by" class="w-full rounded-lg pl-2 border-1 border-gray-300 p-2 box-sizing-content">
                                    <option value="" disabled selected hidden>SORT BY:</option>
                                    <option value="sort_by_name_asc">NAME (A-Z)</option>
                                    <option value="sort_by_name_desc">NAME (Z-A)</option>
                                    <option value="sort_by_price_asc">PRICE (LOW TO HIGH)</option>
                                    <option value="sort_by_price_desc">PRICE (HIGH TO LOW)</option>
                                    <option value="sort_by_stock_asc">STOCK (LOW TO HIGH)</option>
                                    <option value="sort_by_stock_desc">STOCK (HIGH TO LOW)</option>
                                    <option value="sort_by_rating_asc">RATING (LOW TO HIGH)</option>
                                    <option value="sort_by_rating_desc">RATING (HIGH TO LOW)</option>
                                    <option value="sort_by_date_asc">DATE ADDED (OLDEST TO LATEST)</option>
                                    <option value="sort_by_date_desc">DATE ADDED (LATEST TO OLDEST)</option>
                                    <option value="default">None</option>
                                </select>
                            </div>

                            <div class="mb-3 sm:mb-0 sm:pl-2 w-full">
                                <select name="filter_category" id="filter_category" class="w-full rounded-lg pl-2 border-1 border-gray-300 focus:ring-blue-500 p-2">
                                    <option value="default">CATEGORY:</option>
                                    @foreach($categoryList as $category)
                                        <option value="{{$category->id}}">{{$category->category}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3 sm:mb-0 sm:pl-2 w-full">
                                <select name="filter_status" id="filter_status" class="w-full rounded-lg pl-2 border-1 border-gray-300 focus:ring-blue-500 p-2">
                                    <option value="default">STATUS:</option>
                                    <option value="active">ACTIVE</option>
                                    <option value="archived">ARCHIVED</option>
                                </select>
                            </div>

                            <div class="mb-3 sm:mb-0 sm:pl-2 w-full">
                                <select name="filter_stock" id="filter_stock" class="w-full rounded-lg pl-2 border-1 border-gray-300 focus:ring-blue-500 p-2">
                                    <option value="default">STOCK LEVEL:</option>
                                    <option value="belowmin">BELOW MIN</option>
                                    <option value="belowrop">BELOW ROP</option>
                                    <option value="healthy">HEALTHY</option>
                                    <option value="abovemax">ABOVE MAX</option>
                                </select>
                            </div>

                            <div id="loadingScreen" class="hidden sm:flex pl-4">
                                <div role="status">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-200 animate-spin fill-rfg-accent" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <!-- SVG path here -->
                                    </svg>
                                    <span class="sr-only">Loading...</span>

                                    
                                </div>
                            </div>
                                <button data-modal-target="add-product-modal" data-modal-toggle="add-product-modal"class="w-full text-white bg-orange-500 hover:bg-orange-600 focus:ring-2 focus:ring-red-200 font-medium inline-flex items-center justify-center rounded-lg text-sm px-3 py-2 text-center sm:w-auto whitespace-nowrap">
                                    <svg class="-ml-1 mr-2 h-6 w-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                                        <p>Add Product</p>
                                </button>
                        </div>
                    </div> 
                </div>
            </div>
        </div>

            <div class="flex flex-col">
                <div id="datatable"class="">
                    @include('admin.products-table')
                    <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
                </div>
            </div>

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
        $(document).ready(function(){
            const showLoadingScreen = () => {
                $('#loadingScreen').show();
            };

            const hideLoadingScreen = () => {
                $('#loadingScreen').hide();
            };
            const fetch_data = (page, search_term, sort_by, filter_category, filter_status, filter_stock) => {
                showLoadingScreen();
                if(status === undefined){status = "";}
                if(search_term === undefined){search_term = "";}
                if(sort_by === undefined){sort_by = "";}
                if(filter_category === undefined){filter_category = "";}
                if(filter_status === undefined){filter_status = "";}
                if(filter_stock === undefined){filter_stock = "";}
                $.ajax({ 
                    url:"/admin/products/?",
                    data: {
                        page: page,
                        search_term: search_term,
                        sort_by: sort_by, 
                        filter_category: filter_category, 
                        filter_status: filter_status, 
                        filter_stock: filter_stock
                    },
                    beforeSend: function(){
                        showLoadingScreen();
                    },
                    success:function(data){

                        const tempContainer = document.createElement('div');
                        tempContainer.innerHTML = data;

                        const editProductButtons = tempContainer.querySelectorAll('#edit-product-button');
                        const delProductButtons = tempContainer.querySelectorAll('#delete-product-button');
                        const activateProductButtons = tempContainer.querySelectorAll('#activate-product-button');

                        editProductButtons.forEach(function (button) {
                            button.addEventListener('click', function () {
                                const productData = JSON.parse(button.getAttribute('data-product'));
                                console.log(productData);
                                openModal(productData, 'edit');
                            });
                        });
                        if (delProductButtons.length > 0) {
                            delProductButtons.forEach(function(button) {
                                button.addEventListener('click', function() {
                                    const productData = JSON.parse(button.getAttribute('data-product'));
                                    console.log(productData);
                                    openModal(productData, 'delete');
                                });
                            });
                        }
                        if (activateProductButtons.length > 0) {
                            activateProductButtons.forEach(function(button) {
                                button.addEventListener('click', function() {
                                    const productData = JSON.parse(button.getAttribute('data-product'));
                                    console.log(productData);
                                    openModal(productData, 'activate');
                                });
                            });
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
                })
            }
            $('body').on('keyup', '#searchInput', function(){
                var search_term = $('#searchInput').val();
                var page = $('#hidden_page').val();
                var sort_by = $('#sort_by').val();
                var filter_category = $('#filter_category').val();
                var filter_status = $('#filter_status').val();
                var filter_stock = $('#filter_stock').val();
                fetch_data(page, search_term, sort_by, filter_category, filter_status, filter_stock);
            });
            $('body').on('change', '#sort_by', function(){
                var search_term = $('#searchInput').val();
                var page = $('#hidden_page').val();
                var sort_by = $('#sort_by').val();
                var filter_category = $('#filter_category').val();
                var filter_status = $('#filter_status').val();
                var filter_stock = $('#filter_stock').val();
                fetch_data(page, search_term, sort_by, filter_category, filter_status, filter_stock);
            });
            $('body').on('click', '.pager a', function(event){
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                $('#hidden_page').val(page);
                var search_term = $('#searchInput').val();
                var sort_by = $('#sort_by').val();
                var filter_category = $('#filter_category').val();
                var filter_status = $('#filter_status').val();
                var filter_stock = $('#filter_stock').val();
                fetch_data(page, search_term, sort_by, filter_category, filter_status, filter_stock);
            });
            $('body').on('change', '#filter_category', function(){
                var search_term = $('#searchInput').val();
                var page = $('#hidden_page').val();
                var sort_by = $('#sort_by').val();
                var filter_category = $('#filter_category').val();
                var filter_status = $('#filter_status').val();
                var filter_stock = $('#filter_stock').val();
                fetch_data(page, search_term, sort_by, filter_category, filter_status, filter_stock);
            });
            $('body').on('change', '#filter_status', function(){
                var search_term = $('#searchInput').val();
                var page = $('#hidden_page').val();
                var sort_by = $('#sort_by').val();
                var filter_category = $('#filter_category').val();
                var filter_status = $('#filter_status').val();
                var filter_stock = $('#filter_stock').val();
                fetch_data(page, search_term, sort_by, filter_category, filter_status, filter_stock);
            });
            $('body').on('change', '#filter_stock', function(){
                var search_term = $('#searchInput').val();
                var page = $('#hidden_page').val();
                var sort_by = $('#sort_by').val();
                var filter_category = $('#filter_category').val();
                var filter_status = $('#filter_status').val();
                var filter_stock = $('#filter_stock').val();
                fetch_data(page, search_term, sort_by, filter_category, filter_status, filter_stock);
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const editProductButtons = document.querySelectorAll('#edit-product-button');
            const delProductButtons = document.querySelectorAll('#delete-product-button');
            const activateProductButtons = document.querySelectorAll('#activate-product-button');
            editProductButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    const productData = JSON.parse(button.getAttribute('data-product'));
                    console.log(productData);
                    openModal(productData, 'edit');
                });
            });
            delProductButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    const productData = JSON.parse(button.getAttribute('data-product'));
                    console.log(productData);
                    openModal(productData, 'delete');
                });
            });
            activateProductButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    const productData = JSON.parse(button.getAttribute('data-product'));
                    console.log(productData);
                    openModal(productData, 'activate');
                });
            });
        });

        function showModal(elementId){
            const options = {
                placement: 'bottom-right',
                closable: false,
                onHide: () => {
                    console.log('modal is hidden');
                },
                onShow: () => {
                    console.log('modal is shown');
                },
                onToggle: () => {
                    console.log('modal has been toggled');
                }
            };
            const modal = new Modal(document.getElementById(elementId), options);
            modal.show();
        }

        function hideModal(elementId){
            const options = {
                placement: 'bottom-right',
                closable: false,
                onHide: () => {
                    console.log('modal is hidden');
                },
                onShow: () => {
                    console.log('modal is shown');
                },
                onToggle: () => {
                    console.log('modal has been toggled');
                }
            };
            const modal = new Modal(document.getElementById(elementId), options);
            modal.hide();
        }

        function openModal(productData, params) {

            if (params=='edit') {

                const editProductModal = document.getElementById('edit-product-modal');

                const idInput = editProductModal.querySelector('#product_id');
                const skuInput = editProductModal.querySelector('#sku');
                const nameInput = editProductModal.querySelector('#name');
                const priceInput = editProductModal.querySelector('#price');
                const categoryInput = editProductModal.querySelector('#category_id');
                const imageInput = editProductModal.querySelector('#image');
                const minQtyInput = editProductModal.querySelector('#min_qty');
                const maxQtyInput = editProductModal.querySelector('#max_qty');
                const reorderPtInput = editProductModal.querySelector('#reorder_pt');
                const descTextarea = editProductModal.querySelector('#desc');

                idInput.value = productData.id;
                skuInput.value = productData.sku;
                nameInput.value = productData.name;
                priceInput.value = productData.price;
                const productDataCategory = productData.category;
                for (let i = 0; i < categoryInput.options.length; i++) {
                    const categoryOption = categoryInput.options[i];
                    console.log(categoryOption);
                    categoryOption.selected = categoryOption.value === productDataCategory;
                    if (categoryOption.textContent === productDataCategory) {
                        categoryOption.selected = true;
                    } else {
                        categoryOption.selected = false;
                    }
                }
                minQtyInput.value = productData.min_qty;
                maxQtyInput.value = productData.max_qty;
                reorderPtInput.value = productData.reorder_pt;
                descTextarea.value = productData.desc;

                showModal('edit-product-modal');
                console.log(productData);

            } else if (params=='delete') {

                const deleteProductModal = document.getElementById('delete-product-modal');

                const idInput = deleteProductModal.querySelector('#product_id');
                idInput.value = productData.id;

                showModal('delete-product-modal');
                console.log(productData);

            } else if (params=='activate') {

                const activateProductModal = document.getElementById('activate-product-modal');

                const idInput = activateProductModal.querySelector('#product_id');
                idInput.value = productData.id;

                showModal('activate-product-modal');
                console.log(productData);

            }

            
        }

    </script>

    <script src="/js/javascript.js"></script>


</body>
</html>
