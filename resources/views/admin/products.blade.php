<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css"  rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-rfg-canvas">
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
            <script>
                $(document).ready(function() {
                });
            </script>

            <x-database-layout title="Products" modal="product">
                <div class="shadow overflow-hidden">
                    <table class="table-fixed min-w-full ">
                        <thead class="bg-rfg-canvas text-gray-500">
                            <tr>
                                <th scope="col" class="p-4">
                                    <div class="flex items-center">
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
                        <tbody class="bg-rfg-background text-rfg-text ">
                            @foreach ($products as $product)
                            <tr class="hover:bg-rfg-canvas">
                                <td class="p-4 w-4">
                                    <div class="flex items-center">
                                        <input id="checkbox-{{ $product->id }}" aria-describedby="checkbox-1" type="checkbox"
                                            class="bg-gray-50 border-gray-300 focus:ring-3 focus:ring-cyan-200 h-4 w-4 rounded">
                                        <label for="checkbox-{{ $product->id }}" class="sr-only">checkbox</label>
                                    </div>
                                </td>
                                <td class="p-4 whitespace-nowrap text-base font-medium">{{ $product->id }}</td>
                                <td class="p-4 flex items-center whitespace-nowrap space-x-6 mr-12 lg:mr-0">
                                    <img class="h-10 w-10 rounded-full" src="{{ asset('./products/'.$product->image )}}" alt="{{ $product->sku }} avatar">
                                </td>
                                <td class="p-4 whitespace-nowrap text-base font-medium">{{ $product->sku }}</td>
                                <td class="p-4 whitespace-nowrap text-base font-medium">{{ $product->name }}</td>
                                <td class="p-4 whitespace-nowrap text-base font-medium">₱{{ $product->price }}</td>
                                <td class="p-4 whitespace-nowrap text-base font-medium">{{ $product->category }}</td>
                                <td class="p-4 whitespace-nowrap text-base font-medium">
                                    {{ substr($product->desc, 0, 50) }}
                                    {{ strlen($product->desc) > 50 ? '...' : '' }}
                                </td>
                                <td class="p-4 whitespace-nowrap text-base font-medium">
                                    <div class="flex items-center">
                                        @if ($product->computed_quantity == null)
                                            <div class="h-2.5 w-2.5 rounded-full bg-gray-500 mr-2"></div>
                                        @elseif ($product->computed_quantity > $product->max_qty)
                                            <div class="h-2.5 w-2.5 rounded-full bg-red-500 mr-2"></div>
                                        @elseif ($product->computed_quantity >= $product->min_qty && $product->computed_quantity <= $product->max_qty)
                                            <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"></div>
                                        @elseif ($product->computed_quantity < $product->reorder_pt)
                                            <div class="h-2.5 w-2.5 rounded-full bg-red-500 mr-2"></div>
                                        @elseif ($product->computed_quantity < $product->min_qty)
                                            <div class="h-2.5 w-2.5 rounded-full bg-orange-500 mr-2"></div>
                                        @endif
                                        <span>{{ $product->computed_quantity }}</span>
                                    </div>
                                </td>
                                <td class="p-4 whitespace-nowrap text-base font-medium text-center">{{ $product->reorder_pt }} | {{ $product->min_qty }} | {{ $product->max_qty }}</td>
                                <td class="p-4 whitespace-nowrap space-x-2">
                                    <button data-modal-target="product-modal-{{ $product->id }}" data-modal-toggle="product-modal-{{ $product->id }}" class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
                                        <svg class="mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg>
                                        Edit
                                    </button>
                                    <button data-modal-target="delete-product-modal-{{ $product->id }}" data-modal-toggle="delete-product-modal-{{ $product->id }}" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
                                        <svg class="mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                        Delete
                                    </button>
                                </td>
                            </tr>

                                @include('admin.partials.edit-product-modal', ['product' => $product, 'categoryList' => $categoryList])
                                @include('admin.partials.delete-product-modal', ['product' => $product, 'categoryList' => $categoryList])

                            @endforeach
                        </tbody>
                    </table>
                </div>
                <x-slot:pagination>
                    <div class="pt-2">
                        {!! $products->links() !!}
                    </div>
                    
                </x-slot>
                
            </x-database-layout>

            {{-- <div class="bg-white sticky sm:flex items-center w-full sm:justify-between bottom-0 right-0 border-t border-gray-200 p-4">
                <div class="flex items-center mb-4 sm:mb-0">
                    <a href="#" class="text-gray-500 hover:text-gray-900 cursor-pointer p-1 hover:bg-gray-100 rounded inline-flex justify-center">
                        <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-gray-900 cursor-pointer p-1 hover:bg-gray-100 rounded inline-flex justify-center mr-2">
                        <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                    </a>
                    <span class="text-sm font-normal text-gray-500">Showing <span class="text-gray-900 font-semibold">1-20</span> of <span class="text-gray-900 font-semibold">2290</span></span>
                </div>
                <div class="flex items-center space-x-3">
                    <a href="#" class="flex-1 text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium inline-flex items-center justify-center rounded-lg text-sm px-3 py-2 text-center">
                        <svg class="-ml-1 mr-1 h-5 w-5"" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                        Previous
                    </a>
                    <a href="#" class="flex-1 text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium inline-flex items-center justify-center rounded-lg text-sm px-3 py-2 text-center">
                        Next
                        <svg class="-mr-1 ml-1 h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                    </a>
                </div>
            </div> --}}

            <!-- Add Product Modal Start-->
            <div class="hidden overflow-x-hidden overflow-y-auto fixed top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center h-modal sm:h-full" id="add-product-modal">
                <div class="relative w-full max-w-2xl px-4 h-full md:h-auto">
                    <!-- Modal content -->
                    <div class="bg-white rounded-lg shadow relative">
                        <!-- Modal header -->
                        <div class="flex items-start justify-between p-5 border-b rounded-t">
                            <h3 class="text-xl font-semibold">
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
                                        <label for="sku" class="text-sm font-medium text-gray-900 block mb-2">SKU</label>
                                        <input type="text" name="sku" id="sku" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="" required>
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="name" class="text-sm font-medium text-gray-900 block mb-2">Name</label>
                                        <input type="text" name="name" id="name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="" required>
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="price" class="text-sm font-medium text-gray-900 block mb-2">Price</label>
                                        <input type="numer" name="price" id="price" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="" required>
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                        <div class="flex">
                                            <label for="category_id" class="text-sm font-medium text-gray-900 block mb-2 mr-1">Category ID</label>
                                            <a href="/admin/categories">
                                                <svg class="mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
                                                    <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path>
                                                </svg>
                                            </a>
                                        </div>
                                        <select name="category_id" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="" required>
                                            @forelse ($categoryList as $category)
                                                <option value="{{$category->id}}">{{$category->category}}</option>
                                            @empty
                                                <option value="0" disabled>Select Category</option>
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="image" class="text-sm font-medium text-gray-900 block mb-2">Image</label>
                                        <input type="file" name="image" id="image" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-[0.03rem]" placeholder="" required>
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="min_qty" class="text-sm font-medium text-gray-900 block mb-2">Minimum Quantity</label>
                                        <input type="text" name="min_qty" id="min_qty" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="" required>
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="max_qty" class="text-sm font-medium text-gray-900 block mb-2">Maximum Quantity</label>
                                        <input type="text" name="max_qty" id="max_qty" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="" required>
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="reorder_pt" class="text-sm font-medium text-gray-900 block mb-2">Reorder Point</label>
                                        <input type="text" name="reorder_pt" id="reorder_pt" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="" required>
                                    </div>
                                    <div class="col-span-6 sm:col-span-6">
                                        <label for="desc" class="text-sm font-medium text-gray-900 block mb-2">Description</label>
                                        <textarea name="desc" id="desc" rows="4" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="" required></textarea>
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
            <!-- Add Product Modal End-->




        </div>
    </div>

</body>
</html>