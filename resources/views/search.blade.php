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
    <hr class="w-1/4 h-1 mx-auto bg-gray-100 border-0 rounded my-10">
    {{-- search container start --}}
    <div class="flex justify-center mb-10">
        <div class="grid md:grid-cols-4 grid-cols-2 gap-4 h-full">
                {{-- product for loop start --}}
                @forelse($products as $product)

                    <div class="bg-slate-200 w-60 h-[23rem] flex flex-col">
                        <a href="{{route('product.get',['product' => $product])}}" class="flex flex-col h-full">
                            <img src="{{ asset('./products/'.$product->image )}}" 
                            @if ($product->computed_quantity==0 || $product->computed_quantity==null)
                                class="opacity-0" 
                            @endif
                            alt="">
                            <div class="p-2 flex flex-col flex-grow justify-between">
                                <div>
                                    <p class="text-s line-clamp-2">{{ Str::ucfirst($product->name) }}</p>
                                    <p class="text-xs line-clamp-1">{{ $product->category }}</p>
                                </div>
                                <div class="grid grid-cols-2">
                                    <ul class="flex mr-2">
                                        <li>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 mr-1 text-red-500 dark:text-black bi bi-star-fill" viewBox="0 0 16 16">
                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                            </svg>
                                        </li>
                                        <li>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 mr-1 text-red-500 dark:text-black bi bi-star" viewBox="0 0 16 16">
                                                <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                            </svg>
                                        </li>
                                    </ul>
                                    <p></p>
                                    <p class="font-bold">₱{{ $product->price}}</p>
                                    <form action="addtocart/{{$product->id}}">
                                        <button class="bg-orange-400 w-28 text-white font-semibold rounded-xl hover:bg-white hover:text-orange-400" >Add to cart</button>
                                    </form>
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