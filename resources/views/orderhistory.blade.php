<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="">
                    <p>Your Orders</p>
                </div>
                {{-- orders div start --}}
                @foreach ($orders as $order)
                    <div class=" flex flex-col">
                        <p class="pr-5">Order ID: {{$order->id}}</p> 
                        {{-- orders items div start --}}
                        <div class="flex flex-col items-end">
                            @foreach($orderItems[$order->id] as $item)
                            <div class="flex">
                                <p>Product ID: {{ $item->product_id }}</p>
                                <p>Quantity: {{ $item->quantity }}</p>
                                <p>Price: {{ $item->price }}</p>
                            </div>
                            @endforeach
                        </div>
                        {{-- orders items div end --}}
                    </div>
                @endforeach
                {{-- orders div end --}}
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    
                </div>
            </div>
        </div>
    </div>

</x-app-layout>