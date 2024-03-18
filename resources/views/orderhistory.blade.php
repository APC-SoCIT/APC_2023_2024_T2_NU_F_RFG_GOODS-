<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="">
                    <p class="font-bold text-lg">Your Orders</p>
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="w-full">
                @foreach ($orders as $order)
                    <div class="w-full py-2 flex justify-between items-center bg-gray-100 p-10 rounded-lg mb-4">
                        <div>
                            <p>Reference Number: {{$order->order_reference_id}}</p>
                            @php
                                $totalPrice = 0;
                                $itemsCount = count($orderItems[$order->id]); // Count the number of items
                            @endphp
                            @foreach ($orderItems[$order->id] as $item)
                            @php
                                $totalPrice += $item->price;
                            @endphp
                        @endforeach
                            <p>Number of Items: {{$itemsCount}}</p>
                            <p>Total Price: ₱{{$totalPrice}}</p>
                        </div>
                        <div class="text-right">
                            <p class="text-right">Date Ordered: {{$order->created_at}}</p>
                            <a href="/profile/orders/history/{{$order->id}}" class="text-orange-600 text-right">More Details</a>
                        </div>
                    </div>
                @endforeach

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
