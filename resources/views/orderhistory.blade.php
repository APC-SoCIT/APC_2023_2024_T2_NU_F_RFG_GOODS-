<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="">
                    <p>Your Orders</p>
                </div>

                @foreach ($orders as $order)
                    <div class="w-full py-2"><p>Reference Number: {{$order->id}}</p>
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
                        <a href="/profile/orders/history/{{$order->id}}" class="text-orange-600">More Details</a>
                        @if($order->status=='completed')
                        <a href="/profile/orders/history/{{$order->id}}">Rate Now!</a>
                        @endif

                    </div>
                @endforeach
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    
                </div>
            </div>
        </div>
    </div>

</x-app-layout>