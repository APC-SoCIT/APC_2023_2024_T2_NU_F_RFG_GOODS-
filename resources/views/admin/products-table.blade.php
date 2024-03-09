  <div class="drop-shadow-md overflow-x-auto">
        <div class="align-middle inline-block min-w-full overflow-x-auto">
            <div class="overflow-hidden">
                <table class="table-fixed min-w-full divide-y divide-gray-200">
                    <thead class="bg-white text-black">
                        <tr>
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
                    <tbody class="bg-white text-black ">
                        @foreach ($products as $product)
                        <tr class="hover:bg-gray-200 d">
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
                                <button id="edit-product-button" data-product="{{ json_encode($product->toArray()) }}" class="text-white bg-orange-500 hover:bg-orange-600 focus:ring-2 focus:ring-red-200 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
                                    <svg class="mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg>
                                    Edit
                                </button>
                                <button id="delete-product-button" data-product="{{ json_encode($product->toArray()) }}" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
                                    <svg class="mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                    Delete
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
            </div>
        </div>

    </div>


    
    
    
    <div class="pt-2 bg-gray-100">
        {!! $products->links() !!}
    </div>

