<div class="drop-shadow-md overflow-x-auto">
    <div class="align-middle inline-block min-w-full overflow-x-auto">
        <div class="overflow-hidden">
            <table class="table-fixed min-w-full divide-y divide-gray-200">
                <thead class="bg-white">
                    <tr>
                        <th scope="col" class="p-4 text-left text-xs font-medium text-black uppercase">
                            Order ID
                        </th>
                        <th scope="col" class="p-4 text-left text-xs font-medium text-black uppercase">
                            Phone Number
                        </th>
                        <th scope="col" class="p-4 text-left text-xs font-medium text-black uppercase">
                            Waze
                        </th>
                        <th scope="col" class="p-4 text-left text-xs font-medium text-black uppercase">
                            Address
                        </th>
                        <th scope="col" class="p-4 text-left text-xs font-medium text-black uppercase">
                            Phone Number
                        </th>
                        <th scope="col" class="p-4 text-left text-xs font-medium text-black uppercase">
                            Priority
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
                            <td class="p-4 whitespace-nowrap text-base font-medium">{{$delivery->address_lat}}, {{$delivery->long}}</td>
                            <td class="p-4 whitespace-nowrap text-base font-medium">{{$delivery->addressline}}, {{$delivery->barangay}}, {{$delivery['city/municipality']}}, {{$delivery['state/province']}}, {{$delivery->region}}</td>
                            <td class="p-4 whitespace-nowrap text-base font-medium">{{$delivery->priority}}</td>
                            <td class="p-4 whitespace-nowrap text-base font-medium">{{$delivery->eta}}</td>
                            <td class="p-4 whitespace-nowrap text-base font-medium">{{$delivery->shipping_service}}</td>
                            <td class="p-4 whitespace-nowrap text-base font-medium">{{$delivery->shipping_reference_id}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>