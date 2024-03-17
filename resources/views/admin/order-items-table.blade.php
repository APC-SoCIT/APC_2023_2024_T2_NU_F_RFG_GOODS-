<div class="drop-shadow-md overflow-x-auto">
    <div class="align-middle inline-block min-w-full overflow-x-auto">
        <div class="overflow-hidden">
            <table class="table-fixed min-w-full divide-y divide-gray-200">
                <thead class="bg-white">
                    <tr>
                        <th scope="col" class="p-4 text-left text-xs font-medium text-black uppercase">
                            Image
                        </th>
                        <th scope="col" class="p-4 text-left text-xs font-medium text-black uppercase">
                            Product Name
                        </th>
                        <th scope="col" class="p-4 text-left text-xs font-medium text-black uppercase">
                            Quantity
                        </th>
                        <th scope="col" class="p-4 text-left text-xs font-medium text-black uppercase">
                            Status
                        </th>
                        <th scope="col" class="p-4">
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($orders as $order)
                        <tr class="hover:bg-gray-100">
                            <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">{{ $product->image }}</td>
                            <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">{{ $product->name }}</td>
                            <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">{{ $orderItem->quantity }}</td>
                            <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">
                                <div class="flex items-center">
                                    <span>{{$order->status}}</span>
                                    <div class="h-2.5 w-2.5 rounded-full bg-red-500 ml-2"></div>
                                </div>
                            </td>
                            <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">{{ $order->payment_method }}</td>
                            <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">{{ $order->payment_reference_id }}</td>
                            <td class="p-4 whitespace-nowrap space-x-2">
                                <button data-modal-target="view-order-modal" data-modal-toggle="view-order-modal" class="text-white bg-orange-500 hover:bg-orange-700 focus:ring-4 focus:ring-orange-200 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-5 w-5" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                                    </svg>
                                    View
                                </button>
                                <button data-modal-target="edit-order-modal" data-modal-toggle="edit-order-modal" class="text-white bg-orange-500 hover:bg-orange-700 focus:ring-4 focus:ring-orange-200 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
                                    <svg class="mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg>
                                    Edit
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

    <div class="pt-2 bg-gray-100">
        {!! $orders->links() !!}
    </div>
