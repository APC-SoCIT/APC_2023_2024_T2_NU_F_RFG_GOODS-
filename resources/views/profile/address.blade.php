<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <p>My Address</p>
                </div>
            </div>

            

            <form method="post" action="{{ route('profile.addressUpdate') }}">
                @csrf
                @method('patch')

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        <p>{{$userAddress->first_name}} {{$userAddress->last_name}}</p>
                        @if(isset($userAddress->phone_number))
                            <p>{{ $userAddress['phone_number'] }} </p>
                        @endif
                        @if(isset($userAddress->region))
                            <p>{{ $userAddress['region'] }}, {{ $userAddress['state/province'] }}, {{ $userAddress['city/municipality'] }}, {{ $userAddress['barangay'] }}</p>
                            <p>{{$userAddress['addressline']}}</p>
                        @else
                            <div class="flex">
                                <p>Your address @if(!isset($userAddress->phone_number)) and phone number @endif is not set, <span class="text-orange-500">set it up here!</span></p>
                            </div>
                        @endif

                        <label for="phone">Phone Number: 09xxxxxxxxx</label>

                        <input type="tel" id="phone" name="phone" class="w-full" pattern="[0]{1}[9]{1}[0-9]{11}" placeholder="Phone Number" required>

                        <select id="region" class="w-full"></select>
                        <input type="hidden" name="region_text" id="region-text">
                    
                        <select id="province" class="w-full" disabled>
                            <option value="">Choose State/Province</option>
                        </select>
                        <input type="hidden" name="province_text" id="province-text">
                    
                        <select id="city" class="w-full" disabled>
                            <option value="">Choose city/municipality</option>
                        </select>
                        <input type="hidden" name="city_text" id="city-text">
                    
                        <select id="barangay" class="w-full" disabled>
                            <option value="">Choose barangay</option>
                        </select>
                        <input type="hidden" name="barangay_text" id="barangay-text">

                        <input type="text" class="w-full" name="address_specific" id="address-specific" placeholder="Street Name, Building, House No.">

                        <div id="map" class="h-96"></div>

                        <input type="hidden" name="longitude" id="longitude" value="">
                        <input type="hidden" name="latitude" id="latitude" value="">
                        <input type="submit" value="Save" id="addressSaveButton" class="w-full hover:bg-orange-600 bg-orange-500">
                        </input>
                    </div>
                </div>

            </form>

            <input type="checkbox" name="addressbool" id="addressbool" class="hidden">
            <input type="checkbox" name="leafletbool" id="leafletbool" class="hidden">
            <input type="checkbox" name="specificbool" id="specificbool" class="hidden">
            <input type="checkbox" name="phonebool" id="phonebool" class="hidden">

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
    
    {{-- <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script> --}}

            
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
        crossorigin=""/>
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
        crossorigin=""></script>

        <script>
            var map = L.map('map').setView([14.5995, 120.9842], 13);
            // L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            //     maxZoom: 19,
            //     attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            // }).addTo(map);

            L.tileLayer('https://tiles.stadiamaps.com/tiles/outdoors/{z}/{x}/{y}{r}.{ext}', {
                minZoom: 0,
                maxZoom: 20,
                attribution: '&copy; <a href="https://www.stadiamaps.com/" target="_blank">Stadia Maps</a> &copy; <a href="https://openmaptiles.org/" target="_blank">OpenMapTiles</a> &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
                ext: 'png'
            }).addTo(map);

            var marker;
            var globalLatitude;
            var globalLongitude;

            map.on('click', function(e) {
                let latitude = e.latlng.lat.toString().substring(0, 15);
                let longitude = e.latlng.lng.toString().substring(0, 15);
                globalLatitude = latitude;
                globalLongitude = longitude;

                if (marker != null) {
                    map.removeLayer(marker);
                }

                // var popupContent = "Save this location as your address?"
                // var popupContent = "latitude: " + latitude + ", " + "longitude: " + longitude +;
                // popupContent += '<br><a href="/profile/address/save">Save</a>'
                marker = L.marker([latitude, longitude]).addTo(map);
                // marker.bindPopup(popupContent).openPopup();

                var addressTextField = document.getElementById("address-specific");
                var addressCheckbox = document.getElementById("addressbool");
                var leafletCheckbox = document.getElementById("leafletbool");
                var specificCheckbox = document.getElementById("specificbool");
                var longInput = document.getElementById("longitude");
                var latInput = document.getElementById("latitude");

                latInput.value = latitude;
                longInput.value = longitude;

                var leafletCheckbox = document.getElementById("leafletbool");
                leafletCheckbox.checked = true;
                checkCustomFunction();
                

            });

            var addressSaveButton = document.getElementById("addressSaveButton");

            addressSaveButton.disabled = true;
            addressSaveButton.classList.add("bg-gray-500");
            addressSaveButton.classList.remove("bg-orange-500");
            addressSaveButton.classList.remove("hover:bg-orange-600");
            
        </script>
        
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="{{ asset('./ph-address-selector.js')}}"></script>

        <script>
            var addressTextField = document.getElementById("address-specific");
            var phoneNumber = document.getElementById("phone");
            var addressCheckbox = document.getElementById("addressbool");
            var leafletCheckbox = document.getElementById("leafletbool");
            var specificCheckbox = document.getElementById("specificbool");
            var phoneCheckbox = document.getElementById("phonebool");
            
            addressTextField.addEventListener("input", function() {
                if (addressTextField.value.length > 5) {
                    specificCheckbox.checked = true;
                    var event = new Event("change");
                    specificCheckbox.dispatchEvent(event);
                } else {
                    specificCheckbox.checked = false;
                    var event = new Event("change");
                    specificCheckbox.dispatchEvent(event);
                }
            });

            phoneNumber.addEventListener("input", function() {
                if (phoneNumber.value.length > 10) {
                    phoneCheckbox.checked = true;
                    var event = new Event("change");
                    phoneCheckbox.dispatchEvent(event);
                } else {
                    phoneCheckbox.checked = false;
                    var event = new Event("change");
                    phoneCheckbox.dispatchEvent(event);
                }
            })

            

            addressCheckbox.addEventListener("change", checkCustomFunction);
            leafletCheckbox.addEventListener("change", checkCustomFunction);
            specificCheckbox.addEventListener("change", checkCustomFunction);
            phoneCheckbox.addEventListener("change", checkCustomFunction);

            function checkCustomFunction() {
                console.log("Checking");
                if (addressCheckbox.checked && leafletCheckbox.checked && specificCheckbox.checked && phoneCheckbox.checked) {
                    console.log("All checkboxes are checked. Running customFunction...");
                    addressSaveButton.disabled = false;
                    addressSaveButton.classList.add("bg-orange-500");
                    addressSaveButton.classList.add("hover:bg-orange-600");
                    addressSaveButton.classList.remove("bg-gray-500");
                } else {
                    console.log("All checkboxes are not checked.");
                    addressSaveButton.disabled = true;
                    addressSaveButton.classList.remove("bg-orange-500");
                    addressSaveButton.classList.remove("hover:bg-orange-600");
                    addressSaveButton.classList.add("bg-gray-500");
                }
            }
        </script>

</x-app-layout>