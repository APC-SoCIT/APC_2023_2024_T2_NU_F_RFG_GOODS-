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
<body>
    @include('admin.partials.admin-sidebar')

    <div class="p-4 sm:ml-64">
        <div class="mt-16">
        
        <x-database-layout title="Inventories" modal="inventory">
            <div class="shadow overflow-hidden">
                <table class="table-fixed min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th scope="col" class="p-4">
                                <div class="flex items-center">
                                    <input id="checkbox-all" aria-describedby="checkbox-1" type="checkbox"
                                        class="bg-gray-50 border-gray-300 focus:ring-3 focus:ring-cyan-200 h-4 w-4 rounded">
                                    <label for="checkbox-all" class="sr-only">checkbox</label>
                                </div>
                            </th>
                            <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                ID
                            </th>
                            <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                Product SKU
                            </th>
                            <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                Product Name
                            </th>
                            <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                Transaction Type
                            </th>
                            <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                Quantity
                            </th>
                            <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                Created At
                            </th>
                            <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                Updated At
                            </th>
                            <th scope="col" class="p-4">
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($inventoryList as $inventory)
                            <tr class="hover:bg-gray-100">
                                <td class="p-4 w-4">
                                    <div class="flex items-center">
                                        <input id="checkbox-{{ $inventory->id }}" aria-describedby="checkbox-1" type="checkbox"
                                            class="bg-gray-50 border-gray-300 focus:ring-3 focus:ring-cyan-200 h-4 w-4 rounded">
                                        <label for="checkbox-{{ $inventory->id }}" class="sr-only">checkbox</label>
                                    </div>
                                </td>
                                <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">{{ $inventory->id }}</td>
                                <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">{{ $inventory->sku }}</td>
                                <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">{{ $inventory->name }}</td>
                                <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">
                                @if($inventory->is_received == 1) 
                                    <div class="flex items-center">
                                        <span>Received</span>
                                        <div class="h-2.5 w-2.5 rounded-full bg-green-500 ml-2"></div>
                                </div>
                                @else 
                                    <div class="flex items-center">
                                        <span>Shipped</span>
                                        <div class="h-2.5 w-2.5 rounded-full bg-red-500 ml-2"></div>
                                    </div>
                                @endif
                                </td>
                                <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">{{ $inventory->quantity }}</td>
                                <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">{{ $inventory->created_at }}</td>
                                <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">{{ $inventory->updated_at }}</td>
                                <td class="p-4 whitespace-nowrap space-x-2">
                                    <button data-modal-target="inventory-modal-{{ $inventory->id }}" data-modal-toggle="inventory-modal-{{ $inventory->id }}" class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
                                        <svg class="mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg>
                                        Edit
                                    </button>
                                    <button data-modal-target="delete-inventory-modal-{{ $inventory->id }}" data-modal-toggle="delete-inventory-modal-{{ $inventory->id }}" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
                                        <svg class="mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                        Delete
                                    </button>
                                </td>
                            </tr>

                            @include('admin.partials.edit-inventory-modal', ['inventory' => $inventory])
                            @include('admin.partials.delete-inventory-modal', ['inventory' => $inventory])

                        @endforeach
                    </tbody>
                </table>
            </div> 
            <x-slot:pagination>
                <div class="pt-2 bg-gray-100">
                    {!! $inventoryList->links() !!}
                </div>
                
            </x-slot>
        </x-database-layout>

<!-- Add Product Modal -->
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
                                    @forelse ($productList as $product)
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
                    <button class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="submit">Add product</button>
                </div>
                </form>
            </div>
        </div>
            </div>

        </div>
    </div>


</body>
</html>