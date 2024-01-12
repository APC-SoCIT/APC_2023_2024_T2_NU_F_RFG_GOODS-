<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/dist/output.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css"  rel="stylesheet" />
</head>
<body>
    @include('navbar.navbar')
    {{-- filter start --}}
    <div class="flex justify-center">
        <div class="grid grid-cols-3 gap-8 mt-10">
            <div class="bg-slate-200 w-80 h-52 rounded-3xl border-4 border-black">
                <h1 class="text-center font-bold mt-3">Categories</h1>
                <div class="px-8 py-4">
                    <ul>   
                        <li>
                            <a href="" class="font-bold hover:text-orange-500"><span>All Products</span></a>
                        </li>
                        <li>
                            <a href="" class="font-bold hover:text-orange-500"><span>Cooking Essentials</span></a>
                        </li>
                        <li>
                            <a href="" class="font-bold hover:text-orange-500"><span>Snacks</span></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="bg-slate-200 w-80 h-52 rounded-3xl border-4 border-black">
                <h1 class="text-center font-bold mt-3">Price Range</h1>
                <div class="flex justify-center">
                    <form>
                        <label for="number-input" class="block mb-2 text-sm font-medium text-gray-900">Min</label>
                        <input type="number" id="number-input" aria-describedby="helper-text-explanation" class="bg-white border-2 border-black text-gray-900 text-sm rounded-2xl focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="0" required>
                    </form>
                </div>
                <div class="flex justify-center">
                    <form>
                        <label for="number-input" class="block mb-2 text-sm font-medium text-gray-900">Max</label>
                        <input type="number" id="number-input" aria-describedby="helper-text-explanation" class="bg-white border-2 border-black text-gray-900 text-sm rounded-2xl focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="500" required>
                    </form>
                </div>
            </div>
            <div class="bg-slate-200 w-80 h-52 rounded-3xl border-4 border-black">
                <h1 class="text-center font-bold mt-3">Sort</h1>
                <div class="flex flex-col space-y-2 justify-center items-center my-2">   
                    <div class="bg-white w-44 text-center rounded-2xl border-black border-2">
                        <a href="" class=""><span>Relevance</span></a>
                    </div>
                    <div class="bg-white w-44 text-center rounded-2xl border-black border-2">
                        <a href="" class=""><span>Latest</span></a>
                    </div>
                    <div class="bg-white w-44 text-center rounded-2xl border-black border-2">
                        <a href="" class=""><span>Top Sales</span></a>
                    </div>
                    <div>
                    <button id="dropdownHoverButton" data-dropdown-toggle="dropdownHover" data-dropdown-trigger="hover" class="border-black border-2 text-black bg-white hover:bg-slate-300 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-2xl text-sm px-5 py-2.5 text-center inline-flex items-center h-8" type="button">Dropdown hover <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                    </button>

                    <!-- Dropdown menu -->
                        <div id="dropdownHover" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                            <ul class="py-2 text-sm text-black" aria-labelledby="dropdownHoverButton">
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-slate-300">Low to High</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-slate-300">High to Low</a>
                            </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    {{-- filter end --}}
    <hr class="w-1/4 h-1 mx-auto bg-gray-100 border-0 rounded md:my-10">
    {{-- search container start --}}
    <div class="flex justify-center">
        <div class="grid grid-cols-4 gap-10 h-full px-20 mb-10">
                {{-- <div class="relative bg-slate-200 w-60 h-80">
                    <img src="./Img/prod 1.jpg" alt="">
                    <div class="my-1 px-6">
                        <p class="text-xs text-center">RG’S DISTILLED CANE VINEGAR 500ML</p>
                    </div>
                    <div class="absolute bottom-0 grid grid-cols-2 pt-3 mb-2">
                        <div class="mx-auto">
                            <p class="font-bold">₱55</p>
                        </div>
                        <div class="mx-auto">
                            <button class="bg-orange-400 w-28 text-white font-semibold rounded-xl">Add to cart</button>
                        </div>
                    </div>
                </div>
                <div class="relative bg-slate-200 w-60 h-80">
                    <img src="./Img/prod 2.jpg" alt="">
                    <div class="my-1 px-6">
                        <p class="text-xs text-center">RG’S SUKANG TUBA (COCONUT SAP VINEGAR) 500ML</p>
                    </div>
                    <div class="absolute bottom-0 grid grid-cols-2 pt-3 mb-2">
                        <div class="mx-auto">
                            <p class="font-bold">₱70</p>
                        </div>
                        <div class="mx-auto">
                            <button class="bg-orange-400 w-28 text-white font-semibold rounded-xl">Add to cart</button>
                        </div>
                    </div>
                </div>
                <div class="relative bg-slate-200 w-60 h-80">
                    <img src="./Img/prod 3.jpg" alt="">
                    <div class="my-1 px-6">
                        <p class="text-xs text-center">RG’S SUKANG ILOKO ( SUGAR CANE VINEGAR) 500ML</p>
                    </div>
                    <div class="absolute bottom-0 grid grid-cols-2 pt-3 mb-2">
                        <div class="mx-auto">
                            <p class="font-bold">₱60</p>
                        </div>
                        <div class="mx-auto">
                            <button class="bg-orange-400 w-28 text-white font-semibold rounded-xl">Add to cart</button>
                        </div>
                    </div>
                </div>
                <div class="relative bg-slate-200 w-60 h-80">
                    <img src="./Img/garlic-spice.jpg" alt="">
                    <div class="my-1 px-6">
                        <p class="text-xs text-center">JAMIE’S CHILI GARLIC (220ML)</p>
                    </div>
                    <div class="absolute bottom-0 grid grid-cols-2 pt-3 mb-2">
                        <div class="mx-auto">
                            <p class="font-bold">₱160</p>
                        </div>
                        <div class="mx-auto">
                            <button class="bg-orange-400 w-28 text-white font-semibold rounded-xl">Add to cart</button>
                        </div>
                    </div>
                </div>
                <div class="relative bg-slate-200 w-60 h-80">
                    <img src="./Img/chi.jpg" alt="">
                    <div class="my-1 px-6">
                        <p class="text-xs text-center">Ready to fry RG’S Special Pork Chicharon 250g</p>
                    </div>
                    <div class="absolute bottom-0 grid grid-cols-2 pt-3 mb-2">
                        <div class="mx-auto">
                            <p class="font-bold">₱55</p>
                        </div>
                        <div class="mx-auto">
                            <button class="bg-orange-400 w-28 text-white font-semibold rounded-xl">Add to cart</button>
                        </div>
                    </div>
                </div>
                <div class="relative bg-slate-200 w-60 h-80">
                    <img src="./Img/vini-spice.jpg" alt="">
                    <div class="my-1 px-6">
                        <p class="text-xs text-center">JAMIE’S CHILLI VINEGAR - PREMIUM BLEND (375ML)</p>
                    </div>
                    <div class="absolute bottom-0 grid grid-cols-2 pt-3 mb-2">
                        <div class="mx-auto">
                            <p class="font-bold">₱150</p>
                        </div>
                        <div class="mx-auto">
                            <button class="bg-orange-400 w-28 text-white font-semibold rounded-xl">Add to cart</button>
                        </div>
                    </div>
                </div>
                <div class="relative bg-slate-200 w-60 h-80">
                    <img src="./Img/spicy blend.jpg" alt="">
                    <div class="my-1 px-6">
                        <p class="text-xs text-center">RG’S SPICED VINEGAR - SPICY BLEND 500ML</p>
                    </div>
                    <div class="absolute bottom-0 grid grid-cols-2 pt-3 mb-2">
                        <div class="mx-auto">
                            <p class="font-bold">₱130</p>
                        </div>
                        <div class="mx-auto">
                            <button class="bg-orange-400 w-28 text-white font-semibold rounded-xl">Add to cart</button>
                        </div>
                    </div>
                </div>
                <div class="relative bg-slate-200 w-60 h-80">
                    <img src="./Img/chili.jpg" alt="">
                    <div class="my-1 px-6">
                        <p class="text-xs text-center">RG’S CHILI FLAKES 100G</p>
                    </div>
                    <div class="absolute bottom-0 grid grid-cols-2 pt-3 mb-2">
                        <div class="mx-auto">
                            <p class="font-bold">₱140</p>
                        </div>
                        <div class="mx-auto">
                            <button class="bg-orange-400 w-28 text-white font-semibold rounded-xl">Add to cart</button>
                        </div>
                    </div>
                </div> --}}

                {{-- product for loop start --}}
                @forelse($products as $product)
                    <div class="relative bg-slate-200 w-60 h-80">
                        <a href="{{route('product.get',['product' => $product])}}">
                            <img src="{{ asset('./products/'.$product->image )}}" alt="">
                            <div class="my-1 px-6">
                                <p class="text-xs text-center">{{ $product->name}}</p>
                            </div>
                            <div class="absolute bottom-0 grid grid-cols-2 pt-3 mb-2">
                                <div class="mx-auto">
                                    <p class="font-bold">₱{{ $product->price}}</p>
                                </div>
                                <div class="mx-auto">
                                    <a href="addtocart/{{$product->id}}">
                                    <button class="bg-orange-400 w-28 text-white font-semibold rounded-xl" >Add to cart</button>
                                    </a>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <p>No Results Found</p>
                @endforelse
                {{-- product for loop end --}}
        </div>
    </div>
    {{-- search container end --}}
    @include('footer.footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</body>
</html>