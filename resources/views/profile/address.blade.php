<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <p>My Addresses</p>
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <p>{{$userAddress->first_name}} {{$userAddress->last_name}}</p>
                    @if(isset($userAddress->region))
                        <p>{{ $userAddress['region'] }}, {{ $userAddress['state/province'] }}, {{ $userAddress['city/municipality'] }}, {{ $userAddress['barangay'] }}</p>
                    @else
                        <div class="flex">
                            <p>Your Address is not set, <span class="text-orange-500">set up now!</span></p>
                        </div>
                    @endif

                    <select id="region" class="w-full"></select>
                    <input type="hidden" name="region_text" id="region-text">
                
                    <select id="province" class="w-full"></select>
                    <input type="hidden" name="province_text" id="province-text">
                
                    <select id="city" class="w-full"></select>
                    <input type="hidden" name="city_text" id="city-text">
                
                    <select id="barangay" class="w-full"></select>
                    <input type="hidden" name="barangay_text" id="barangay-text">

                    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
                    <script src="{{ asset('./ph-address-selector.js')}}"></script>

                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    
                </div>
            </div>
        </div>
    </div>
    
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script type="module" src="{{ asset('js/scripts/phAddressScript.js') }}"></script>
    <script type="module" >
        import { PhAddress } from 'ph-address';

        (async () => {

            const phAddress = new PhAddress()
            const addressFinder = await phAddress.useSqlite()
            let addresses = await addressFinder.find('brgy 168')
            console.log(addresses)

        })()
    </script>

</x-app-layout>