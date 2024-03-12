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
                            Stock
                        </th>
                        <th scope="col" class="p-4 text-left text-xs font-medium uppercase">
                            Rating
                        </th>
                        <th scope="col" class="p-4 text-left text-xs font-medium uppercase">
                            Description
                        </th>
                        <th scope="col" class="p-4 text-center text-xs font-medium uppercase whitespace-nowrap">
                            ROP | Min | Max
                        </th>
                        <th scope="col" class="p-4">
                        </th>
                    </tr>
                </thead>

                @php
                    $rowClass = 'bg-white';
                @endphp
                
                <tbody class="bg-white text-black ">
                    @foreach ($products as $product)
                        @if($loop->index % 2 == 0)
                            @php $rowClass = 'bg-white'; @endphp
                        @else
                            @php $rowClass = 'bg-gray-100'; @endphp
                        @endif
                    <tr class="{{ $rowClass }} hover:bg-gray-200 d">
                        <td class="p-4 whitespace-nowrap text-base font-medium">{{ $product->id }}</td>
                        <td class="p-4 flex items-center whitespace-nowrap space-x-6 mr-0">
                            <img class="h-10 w-10 rounded-full" src="{{ asset('./products/'.$product->image )}}" alt="{{ $product->sku }} avatar">
                        </td>
                        <td class="p-4 whitespace-nowrap text-base font-medium">{{ $product->sku }}</td>
                        <td class="p-4 whitespace-nowrap text-base font-medium">{{ $product->name }}</td>
                        <td class="p-4 whitespace-nowrap text-base font-medium">₱{{ $product->price }}</td>
                        <td class="p-4 whitespace-nowrap text-base font-medium">{{ $product->category }}</td>
                        <td class="p-4 whitespace-nowrap text-base font-medium">
                            <div class="flex items-center">
                                @if($product->status != 'archived')
                                    @if ($product->stock == null)
                                        <div class="h-2.5 w-2.5 rounded-full bg-gray-500 mr-2"></div>
                                    @elseif ($product->stock > $product->max_qty)
                                        <div class="h-2.5 w-2.5 rounded-full bg-red-500 mr-2"></div>
                                    @elseif ($product->stock >= $product->min_qty && $product->stock <= $product->max_qty)
                                        <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"></div>
                                    @elseif ($product->stock < $product->reorder_pt)
                                        <div class="h-2.5 w-2.5 rounded-full bg-red-500 mr-2"></div>
                                    @elseif ($product->stock < $product->min_qty)
                                        <div class="h-2.5 w-2.5 rounded-full bg-orange-500 mr-2"></div>
                                    @endif
                                    <span>{{ $product->stock }}</span>
                                @else
                                <span class="font-bold capitalize text-red-500">ARCHIVED</span>
                                @endif
                            </div>
                        </td>
                        <td class="p-4 whitespace-nowrap text-base font-medium">{{ $product->rating }}</td>
                        <td class="p-4 whitespace-nowrap text-base font-medium">
                            {{ substr($product->desc, 0, 50) }}
                            {{ strlen($product->desc) > 50 ? '...' : '' }}
                        </td>
                        <td class="p-4 whitespace-nowrap text-base font-medium text-center">{{ $product->reorder_pt }} | {{ $product->min_qty }} | {{ $product->max_qty }}</td>
                        <td class="p-4 whitespace-nowrap space-x-2">
                            <button id="edit-product-button" data-product="{{ json_encode($product->toArray()) }}" class="text-white bg-orange-500 hover:bg-orange-600 focus:ring-2 focus:ring-red-200 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
                                <svg class="mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg>
                                Edit
                            </button>
                            @if ($product->status != 'archived')
                                <button id="delete-product-button" data-product="{{ json_encode($product->toArray()) }}" class="text-white bg-red-600 hover:bg-red-800 focus:ring-2 focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
                                    <svg class="mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15zM5.5 7h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1M.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8z"/>
                                    </svg>
                                    Archive
                                </button>
                            @else 
                                <button id="activate-product-button" data-product="{{ json_encode($product->toArray()) }}" class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-2 focus:ring-blue-300 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
                                    <svg class="mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M3.5 6a.5.5 0 0 0-.5.5v8a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5v-8a.5.5 0 0 0-.5-.5h-2a.5.5 0 0 1 0-1h2A1.5 1.5 0 0 1 14 6.5v8a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 14.5v-8A1.5 1.5 0 0 1 3.5 5h2a.5.5 0 0 1 0 1z"/>
                                        <path fill-rule="evenodd" d="M7.646.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 1.707V10.5a.5.5 0 0 1-1 0V1.707L5.354 3.854a.5.5 0 1 1-.708-.708z"/>
                                    </svg>
                                    Activate
                                </button>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="pt-2 bg-gray-100">
    {!! $products->links() !!}
</div>

