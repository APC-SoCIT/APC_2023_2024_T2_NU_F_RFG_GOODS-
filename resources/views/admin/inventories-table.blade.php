<div class="align-middle inline-block min-w-full">
    <div class="shadow overflow-hidden">
        <table class="table-fixed min-w-full divide-y divide-gray-200">
            <thead class="bg-white">
                <tr>
                    <th scope="col" class="p-4">
                        <div class="flex items-center">
                            <input id="checkbox-all" aria-describedby="checkbox-1" type="checkbox"
                                class="bg-white border-gray-300 focus:ring-3 focus:ring-cyan-200 h-4 w-4 rounded">
                            <label for="checkbox-all" class="sr-only">checkbox</label>
                        </div>
                    </th>
                    <th scope="col" class="p-4 text-left text-xs font-medium text-black uppercase">
                        ID
                    </th>
                    <th scope="col" class="p-4 text-left text-xs font-medium text-black uppercase">
                        Product SKU
                    </th>
                    <th scope="col" class="p-4 text-left text-xs font-medium text-black uppercase">
                        Product Name
                    </th>
                    <th scope="col" class="p-4 text-left text-xs font-medium text-black uppercase">
                        Transaction Type
                    </th>
                    <th scope="col" class="p-4 text-left text-xs font-medium text-black uppercase">
                        Quantity
                    </th>
                    <th scope="col" class="p-4 text-left text-xs font-medium text-black uppercase">
                        Created At
                    </th>
                    <th scope="col" class="p-4 text-left text-xs font-medium text-black uppercase">
                        Updated At
                    </th>
                    <th scope="col" class="p-4">
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($inventories as $inventory)
                    <tr class="hover:bg-gray-100">
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
                            <button data-modal-target="inventory-modal-{{ $inventory->id }}" data-modal-toggle="inventory-modal-{{ $inventory->id }}" class="text-white bg-orange-500 hover:bg-orange-800 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
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
        <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
    </div>
</div>
<div class="pt-2 bg-gray-100">
{!! $inventories->links() !!}
</div>