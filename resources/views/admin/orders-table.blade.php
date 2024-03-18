<div class="drop-shadow-md overflow-x-auto">
    <div class="align-middle inline-block min-w-full overflow-x-auto">
        <div class="overflow-hidden">
            <table class="table-fixed min-w-full divide-y divide-gray-200">
                <thead class="bg-white">
                    <tr>
                        <th scope="col" class="p-4 text-left text-xs font-medium text-black uppercase">
                            ID
                        </th>
                        <th scope="col" class="p-4 text-left text-xs font-medium text-black uppercase">
                            Last Name
                        </th>
                        <th scope="col" class="p-4 text-left text-xs font-medium text-black uppercase">
                            First Name
                        </th>
                        <th scope="col" class="p-4 text-left text-xs font-medium text-black uppercase">
                            {{-- back step button --}}
                        </th>
                        <th scope="col" class="p-4 text-center text-xs font-medium text-black uppercase">
                            Status
                        </th>
                        <th scope="col" class="p-4 text-left text-xs font-medium text-black uppercase">
                            {{-- next step button--}}
                        </th>
                        <th scope="col" class="p-4 text-left text-xs font-medium text-black uppercase text-center">
                            Payment Method
                        </th>
                        <th scope="col" class="p-4 text-left text-xs font-medium text-black uppercase text-center">
                            Payment Reference ID
                        </th>
                        <th scope="col" class="p-4">
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($orders as $order)
                        <tr class="hover:bg-gray-100">

                            <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">{{ $order->order_reference_id }}</td>
                            <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">{{ $order->last_name }}</td>
                            <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">{{ $order->first_name }}</td>
                            <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900 justify-center flex">
                                <button id="status-back" name="status-back" data-status="{{$order->status}}" data-order-id="{{$order->order_id_alias}}" class="text-white bg-orange-500 hover:bg-orange-700 focus:ring-4 focus:ring-orange-200 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
                                    <svg class="h-5 w-5 pr-0.5" fill="currentColor" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg">
                                        <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
                                    </svg>
                                </button>
                            </td>
                            <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">
                                <div class="flex items-center justify-center">
                                    <span data-order-id="{{$order->order_id_alias}}">{{$order->status}}</span>
                                </div>
                            </td>
                            <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900 justify-center flex">
                                <button id="status-next" name="status-next" data-status="{{$order->status}}" data-order-id="{{$order->order_id_alias}}" class="text-white bg-orange-500 hover:bg-orange-700 focus:ring-4 focus:ring-orange-200 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
                                    <svg class="h-5 w-5 pr-0.5" fill="currentColor" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg">
                                        <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                                    </svg>
                                </button>
                            </td>
                            <td class="p-4 whitespace-nowrap text-base font-medium text-center text-gray-900">{{ $order->payment_method }}</td>
                            <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900 text-center">
                                @if( $order->payment_reference_id == null)
                                    N/A
                                @else
                                    {{ $order->payment_reference_id }}
                                @endif
                            </td>

                            <td class="p-4 whitespace-nowrap space-x-2">
                                <button id="view-order-button" name="view-order-button" data-order="{{$order->order_id_alias}}" class="text-white bg-orange-500 hover:bg-orange-700 focus:ring-4 focus:ring-orange-200 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-5 w-5" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                                    </svg>
                                    View
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
