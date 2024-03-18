<div class="drop-shadow-md overflow-x-auto">
    <div class="align-middle inline-block min-w-full overflow-x-auto">
        <div class="overflow-hidden">
            <table class="table-fixed min-w-full divide-y divide-gray-200">
                <thead class="bg-white">
                    <tr>
                        <th scope="col" class="p-2 text-left text-xs font-medium text-black uppercase">
                            Order ID
                        </th>
                        <th scope="col" class="p-4 text-left text-xs font-medium text-black uppercase">
                            Phone Number
                        </th>
                        <th scope="col" class="p-1 text-left text-xs font-medium text-black uppercase">
                            Name
                        </th>
                        <th scope="col" class="p-4 text-left text-xs font-medium text-black uppercase">
                            Waze
                        </th>
                        <th scope="col" class="p-4 text-left text-xs font-medium text-black uppercase">
                            Address
                        </th>
                        <th scope="col" class="p-4 text-left text-xs font-medium text-black uppercase">
                            ETA
                        </th>
                        <th scope="col" class="p-4 text-left text-xs font-medium text-black uppercase">
                            Shipping Service
                        </th>
                        <th scope="col" class="p-4 text-left text-xs font-medium text-black uppercase">
                            Reference ID
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($deliveries as $delivery)
                        <tr class="hover:bg-gray-100">
                            <td class="p-4 whitespace-nowrap text-base font-medium">{{$delivery->order_id}}</td>
                            <td class="p-4 whitespace-nowrap text-base font-medium">{{$delivery->phone_number}}</td>
                            <td class="whitespace-nowrap text-base font-medium">{{$delivery->order->user->last_name}}, {{$delivery->order->user->first_name}}</td>
                            <td class="whitespace-nowrap font-medium">
                                <a class="p-2 rounded-lg bg-cyan-400 text-sm"href="https://www.waze.com/live-map/directions?navigate=yes&to=ll.{{$delivery->address_lat}}%2C{{$delivery->address_long}}&from=place.w.79298707.793249218.3247728">
                                OPEN IN WAZE</a>
                                {{-- {{$delivery->address_lat}}, {{$delivery->address_long}} --}}
                            </td>
                            <td class="p-4 whitespace-nowrap text-xs font-medium">
                                <div class="flex flex-col">
                                    <span>{{ $delivery->addressline }}, {{ $delivery->barangay }}, {{ $delivery['city/municipality'] }}</span>
                                    <span>{{ $delivery['state/province'] }}, {{ $delivery->region }}</span>
                                </div>
                            </td>
                            <td class="p-4 whitespace-nowrap text-base font-medium">{{$delivery->eta}}</td>
                            <td class="p-4 whitespace-nowrap text-base font-medium">{{$delivery->shipping_service}}</td>
                            <td class="p-4 whitespace-nowrap text-base font-medium">{{$delivery->order->order_reference_id }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>