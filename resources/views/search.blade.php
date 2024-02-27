<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/dist/output.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css"  rel="stylesheet" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
    @include('navbar.navbar')

    <div class="flex">
        {{-- filter start --}}
        <div class="hidden h-dvh md:flex">
            <div class="w-96 border-black border-4 p-5">
                <p >Filters</p>

                <hr class="my-2">

                <div id="accordion-collapse" data-accordion="open" class="w-full">

                    <h2 id="accordion-collapse-price">
                        <button type="button" class="flex items-center justify-between w-full p-2 font-medium rtl:text-right bg-white" 
                        data-accordion-target="#accordion-collapse-price-body" 
                        aria-expanded="true" 
                        aria-controls="accordion-collapse-price-body">
                            <span>Price</span>
                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-collapse-price-body" class="hidden w-full" aria-labelledby="accordion-collapse-price">
                        <div class="p-2">
                            <div class="flex justify-between gap-4">
                                <input type="text" class="w-full">
                                <input type="text" class="w-full">
                            </div>
                        </div>
                    </div>

                    <hr class="my-2">

                    <h2 id="accordion-collapse-availability">
                        <button type="button" class="flex items-center justify-between w-full p-2 font-medium rtl:text-right bg-white" 
                        data-accordion-target="#accordion-collapse-availability-body" 
                        aria-expanded="true" 
                        aria-controls="accordion-collapse-availability-body">
                            <span>Availability</span>
                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-collapse-availability-body" class="hidden" aria-labelledby="accordion-collapse-availability">
                        <div class="p-2 pl-5">
                            <div class="flex items-center gap-2">
                                <input name="filter.category" type="checkbox">
                                <label for="filter.category">In Stock</label>
                            </div>
                        </div>
                    </div>

                    <hr class="my-2">

                    <h2 id="accordion-collapse-heading-3">
                        <button type="button" class="flex items-center justify-between w-full p-2 font-medium rtl:text-right bg-white" 
                        data-accordion-target="#accordion-collapse-body-3" 
                        aria-expanded="true" 
                        aria-controls="accordion-collapse-body-3">
                            <span>Category</span>
                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-collapse-body-3" class="hidden" aria-labelledby="accordion-collapse-heading-3">
                        <div class="p-2 pl-5">
                            <div class="flex items-center gap-2">
                                <input name="filter.category" type="checkbox">
                                <label for="filter.category">All</label>
                            </div>
                            @foreach ($categoryList as $category)
                                <div class="flex items-center gap-2">
                                    <input name="filter.category" type="checkbox">
                                    <label for="filter.category">{{$category->category}}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- filter end --}}

        <div class="flex flex-col">
            {{-- search container start --}}
            <div class="flex justify-center mb-10 px-5">
                <div class="grid md:grid-cols-4 grid-cols-2 gap-4 h-full">
                    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
                    <script>
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                    </script>
                    <script>
                        $(document).ready(function() {
                            
                        });
                    </script>

                        {{-- product for loop start --}}
                        @forelse($products as $product)
    
                            <div class="bg-slate-200 w-60 h-[23rem] flex flex-col">
                                <a href="{{route('product.get',['product' => $product])}}" class="flex flex-col h-full">
                                    {{-- <img src="{{ asset('./products/'.$product->image )}}" 
                                    @if ($product->computed_quantity==0 || $product->computed_quantity==null)
                                        class="opacity-0" 
                                    @endif
                                    alt=""> --}}
                                    <div class="p-2 flex flex-col flex-grow justify-between">
                                        <div>
                                            <p class="text-s line-clamp-2">{{ Str::ucfirst($product->name) }}</p>
                                            <p class="text-xs line-clamp-1">{{ $product->category }}</p>
                                        </div>
                                        <div class="grid grid-cols-2">
                                            @php
                                                $avgRating = $product->avg_rating;
                                                $maxRating = 5;

                                                $filledStars = min(round($avgRating), $maxRating);
                                                $emptyStars = $maxRating - $filledStars;
                                            @endphp
                                            <ul class="flex mr-2">
                                                @for ($i = 0; $i < $filledStars; $i++)
                                                    <li>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 mr-1 text-red-500 dark:text-black bi bi-star-fill" viewBox="0 0 16 16">
                                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                        </svg>
                                                    </li>
                                                @endfor
                                                @for ($i = 0; $i < $emptyStars; $i++)
                                                    <li>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 mr-1 text-red-500 dark:text-black bi bi-star" viewBox="0 0 16 16">
                                                            <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                                        </svg>
                                                    </li>
                                                @endfor

                                            </ul>
                                            <p>
                                                @if ($product->avg_rating == null) 
                                                    No reviews
                                                @else ()
                                                    {{$product->avg_rating}}
                                                @endif
                                            </p>
                                            <p class="font-bold">₱{{ $product->price}}</p>
                                            <form action="{{ route('product.addtocart')}}" method="POST">
                                                @csrf
                                                <input type="hidden" name="user_id" value="@if(Auth::user() != null) {{ Auth::user()->id }} @else @endif">
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <button type="submit" class="bg-orange-400 w-28 text-white font-semibold rounded-xl hover:bg-white hover:text-orange-400" >Add to cart</button>
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
            <div class="pt-2">
                {!! $products->links() !!}
            </div>
            
        </div>

        
    </div>

    @include('footer.footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</body>
</html>