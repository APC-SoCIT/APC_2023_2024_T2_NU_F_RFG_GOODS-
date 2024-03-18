<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RFG - Search</title>
    <link rel="icon" href="./Img/logo1.png" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css"  rel="stylesheet" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-gray-100">
    @include('navbar.navbar')
    <div class="block flex-col items-center">
        <div class="flex justify-center">
            {{-- filter start --}}
            <div class="hidden h-dvh md:flex">
                <div class="w-96 p-5 relative">
                    <p class="font-bold">Filters</p>
                    <hr class="mb-2">
                    <div id="accordion-collapse" data-accordion="open" class="w-full">
                        {{-- <h2 id="accordion-collapse-price">
                        <button type="button" class="flex items-center justify-between w-full p-2 font-medium rtl:text-right text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" 
                            data-accordion-target="#accordion-collapse-price-body" 
                            aria-expanded="true" 
                            aria-controls="accordion-collapse-price-body"
                            style="background-color: #F6903F;">
                                <span class="text-white">Price</span>
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
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
                        </div> --}}

                        {{-- <hr class="my-2"> --}}

                        <h2 id="accordion-collapse-availability">
                            <button type="button" class="flex items-center justify-between w-full p-2 font-medium rtl:text-right bg-" 
                            data-accordion-target="#accordion-collapse-availability-body" 
                            aria-expanded="true" 
                            aria-controls="accordion-collapse-availability-body"
                            style="background-color: #F6903F;">
                                <span class="text-white">Availability</span>
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                                </svg>
                            </button>
                        </h2>

                        <div id="accordion-collapse-availability-body" class="hidden" aria-labelledby="accordion-collapse-availability">
                            <div class="p-2">
                                <div class="flex items-center gap-2 cursor-pointer hover:bg-gray-400 pl-2" onclick="toggleCheckboxInDiv(this, 'filter_stock')">
                                    <input id="filter_stock" type="checkbox" 
                                    class="text-black focus:ring-transparent focus:outline-none" 
                                    onclick="toggleCheckboxInDiv(this.parentNode, 'filter_stock')"
                                    onclick="">
                                    <label for="filter_stock" 
                                    class="select-none" 
                                    onclick="toggleCheckboxInDiv(this.parentNode, 'filter_stock')">In Stock</label>
                                </div>
                            </div>
                        </div>

                        <script>
                            function toggleCheckbox(checkboxInput) {
                                var checkbox = checkboxInput;
                                checkbox.checked = !checkbox.checked;
                            }
                        </script>

                        <hr class="mb-2">

                        <h2 id="accordion-collapse-category">
                            <button type="button" class="flex items-center justify-between w-full p-2 font-medium rtl:text-right bg-white" 
                            data-accordion-target="#accordion-collapse-category-body" 
                            aria-expanded="true" 
                            aria-controls="accordion-collapse-category-body"
                            style="background-color: #F6903F;">
                                <span class="text-white">Category</span>
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-collapse-category-body" class="hidden transition-all" aria-labelledby="accordion-collapse-heading-3">
                            <div id="catFilters"class="p-2">
                                <div class="flex items-center gap-2 cursor-pointer hover:bg-gray-400 pl-2" onclick="toggleCheckboxInDiv(this, 'filter.categoryAll')">
                                    <input id="filter.categoryAll" type="checkbox" name="category_checkbox" value="default" class="text-black focus:ring-transparent focus:outline-none" 
                                    onclick="toggleCheckboxInDiv(this.parentNode, 'filter.categoryAll')">
                                    <label for="filter.categoryAll" class="w-full h-full"
                                    onclick="toggleCheckboxInDiv(this.parentNode, 'filter.categoryAll')">All</label>
                                </div>
                                @foreach ($categoryList as $category)
                                    <div class="flex items-center gap-2 cursor-pointer hover:bg-gray-400 pl-2" 
                                    onclick="toggleCheckboxInDiv(this, 'category_{{$category->category}}')">
                                        <input id="category_{{$category->category}}" 
                                                name="category_checkbox" 
                                                value="{{$category->id}}" 
                                                type="checkbox" 
                                                class="text-black focus:ring-transparent focus:outline-none" 
                                                onclick="toggleCheckboxInDiv(this.parentNode, 'category_{{$category->category}}')">
                                        <label for="category_{{$category->category}}" class="w-full h-full"
                                            onclick="toggleCheckboxInDiv(this.parentNode, 'category_{{$category->category}}')">{{$category->category}}</label>
                                    </div>
                                @endforeach

                            </div>
                        </div>

                        <hr class="mb-2">

                        <h2 id="accordion-collapse-rating">
                            <button type="button" class="flex items-center justify-between w-full p-2 font-medium rtl:text-right bg-white" 
                            data-accordion-target="#accordion-collapse-rating-body" 
                            aria-expanded="true" 
                            aria-controls="accordion-collapse-rating-body"
                            style="background-color: #F6903F;">
                                <span class="text-white">Ratings</span>
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-collapse-rating-body" class="hidden transition-all" aria-labelledby="accordion-collapse-heading-3">
                            <div class="p-2">
                            <div class="flex items-center gap-2 cursor-pointer hover:bg-gray-400 pl-2" onclick="toggleCheckboxInDiv(this, 'filter.rating5')">
                                    <input id="filter.rating5" type="radio" name="rating" value="5" class="text-black focus:ring-transparent focus:outline-none"  onclick="toggleCheckboxInDiv(this.parentNode, 'filter.rating5')">
                                    <label for="filter.rating5" class="flex cursor-pointer select-none" onclick="toggleCheckboxInDiv(this.parentNode, 'filter.rating5')">5</label>
                                        <div class="flex pl-2 items-center">
                                            @for ($i = 0; $i < 5; $i++)
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 mr-1 text-rfg-accent bi bi-star-fill " viewBox="0 0 16 16">
                                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                </svg>     
                                            @endfor
                                        </div>
                                    </label>
                                </div>
                                <div class="flex items-center gap-2 cursor-pointer hover:bg-gray-400 pl-2" onclick="toggleCheckboxInDiv(this, 'filter.rating4')">
                                <input id="filter.rating4" type="radio" name="rating" value="4" class="text-black focus:ring-transparent focus:outline-none"  onclick="toggleCheckboxInDiv(this.parentNode, 'filter.rating4')">
                                    <label for="filter.rating4" class="flex cursor-pointer select-none" onclick="toggleCheckboxInDiv(this.parentNode, 'filter.rating4')">4</label>
                                        <div class="flex pl-2 items-center">
                                            @for ($i = 0; $i < 4; $i++)
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 mr-1 text-rfg-accent bi bi-star-fill " viewBox="0 0 16 16">
                                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                </svg>     
                                            @endfor
                                            @for ($i = 0; $i < 1; $i++)
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 mr-1 text-rfg-accent bi bi-star" viewBox="0 0 16 16">
                                                    <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                                </svg>
                                            @endfor
                                        </div>
                                    </label>
                                </div>
                                <div class="flex items-center gap-2 cursor-pointer hover:bg-gray-400 pl-2" onclick="toggleCheckboxInDiv(this, 'filter.rating3')">
                                <input id="filter.rating3" type="radio" name="rating" value="3" class="text-black focus:ring-transparent focus:outline-none"  onclick="toggleCheckboxInDiv(this.parentNode, 'filter.rating3')">
                                    <label for="filter.rating3" class="flex cursor-pointer select-none" onclick="toggleCheckboxInDiv(this.parentNode, 'filter.rating3')">3</label>
                                        <div class="flex pl-2 items-center">
                                            @for ($i = 0; $i < 3; $i++)
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 mr-1 text-rfg-accent bi bi-star-fill " viewBox="0 0 16 16">
                                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                </svg>     
                                            @endfor
                                            @for ($i = 0; $i < 2; $i++)
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 mr-1 text-rfg-accent bi bi-star" viewBox="0 0 16 16">
                                                <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                            </svg>
                                        @endfor
                                        </div>
                                    </label>
                                </div>
                                <div class="flex items-center gap-2 cursor-pointer hover:bg-gray-400 pl-2" onclick="toggleCheckboxInDiv(this, 'filter.rating2')">
                                    <input id="filter.rating2" type="radio" name="rating" value="2" class="text-black focus:ring-transparent focus:outline-none"  onclick="toggleCheckboxInDiv(this.parentNode, 'filter.rating2')">
                                    <label for="filter.rating2" class="flex cursor-pointer select-none" onclick="toggleCheckboxInDiv(this.parentNode, 'filter.rating2')">2</label>
                                        <div class="flex pl-2 items-center">
                                            @for ($i = 0; $i < 2; $i++)
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 mr-1 text-rfg-accent bi bi-star-fill " viewBox="0 0 16 16">
                                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                </svg>     
                                            @endfor
                                            @for ($i = 0; $i < 3; $i++)
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 mr-1 text-rfg-accent bi bi-star" viewBox="0 0 16 16">
                                                <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                            </svg>
                                        @endfor
                                        </div>
                                    </label>
                                </div>
                                <div class="flex items-center gap-2 cursor-pointer hover:bg-gray-400 pl-2" onclick="toggleCheckboxInDiv(this, 'filter.rating1')">
                                    <input id="filter.rating1" type="radio" name="rating" value="1" class="text-black focus:ring-transparent focus:outline-none"  onclick="toggleCheckboxInDiv(this.parentNode, 'filter.rating1')">
                                    <label for="filter.rating1" class="flex cursor-pointer select-none" onclick="toggleCheckboxInDiv(this.parentNode, 'filter.rating1')">1</label>
                                        <div class="flex pl-2 items-center">
                                            @for ($i = 0; $i < 1; $i++)
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 mr-1 text-rfg-accent bi bi-star-fill " viewBox="0 0 16 16">
                                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                </svg>     
                                            @endfor
                                            @for ($i = 0; $i < 4; $i++)
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 mr-1 text-rfg-accent bi bi-star" viewBox="0 0 16 16">
                                                <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                            </svg>
                                        @endfor
                                        </div>
                                    </label>
                                </div>
                                <div class="flex items-center gap-2 cursor-pointer hover:bg-gray-400 pl-2" onclick="toggleCheckboxInDiv(this, 'filter.rating0')">
                                <input id="filter.rating1" type="radio" name="rating" value="0" class="text-black focus:ring-transparent focus:outline-none"  onclick="toggleCheckboxInDiv(this.parentNode, 'filter.rating0')" checked>
                                    <label for="filter.rating0" class="flex cursor-pointer select-none" onclick="toggleCheckboxInDiv(this.parentNode, 'filter.rating0')">No reviews</label>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            {{-- filter end --}}

            <div class="flex flex-col">
                <div class=pt-5>
                    <div class="flex justify-between pr-5">
                        <div class="flex">
                            <p>Search results for </p>
                            <p id="hidden_search" class="font-bold ml-1"> '{{ request('search') }}' </p>
                        </div>
                        <div class="pb-2">
                                <select name="sort" id="sort" class="rounded-lg pl-2 focus:ring-0 border-1 border-gray-200" onchange="sortProducts()">
                                    <option value="" disable selected>
                                        SORT BY:
                                    </option>
                                    <option value="price_asc">
                                        Price: Low to High
                                    </option>
                                    <option value="price_desc">
                                        Price: High to Low
                                    </option>
                                </select>
                        </div>
                    </div>
                
                <hr class=mb-2>
                </div>
                <div class="relative ">
                        {{-- search container start --}}
                        <div class="flex justify-center mb-10 px-5 items-center">
                            <div id="searchContainer">
                                    @include('search-grid')
                                    <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
                            </div>
                            {{-- <div id="loadingScreen"role="status" class="z-100 hidden items-center justify-center absolute">
                                <svg aria-hidden="true" class="w-1/2 h-1/2 text-gray-200 animate-spin  fill-rfg-accent" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                                </svg>
                                <span class="sr-only">Loading...</span>
                            </div> --}}
                        </div>
                        {{-- search container end --}}
                        

                </div>

            </div>
    
        </div>

    </div>

    @include('footer.footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    <script>
        function toggleCheckboxInDiv(divElement, id) {
            var checkbox = divElement.querySelector('input[id="' + id + '"]');
            checkbox.checked = !checkbox.checked;
        }
    </script>
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
            const showLoadingItem = () => {
                $('div[name="product_grid_item"]').css('opacity', 1);
            };

            const hideLoadingItem = () => {
                $('div[name="product_grid_item"]').css('opacity', 0.5);
            };

            const fetch_data = (page, selectedCategories, selectedRatings, stock, search_term, sort_by) => {
                if (selectedCategories === undefined) { selectedCategories = ""; }
                if (selectedRatings === undefined) { selectedRatings = ""; }
                if (stock === undefined) { stock = ""; } 
                if (search_term === undefined) {search_term = ""; } 
                if (sort_by === undefined) { sort_by = ""; }
                $.ajax({
                    url:"/search?",
                    data: {
                        page: page,
                        selectedCategories: selectedCategories,
                        selectedRatings: selectedRatings,
                        filter_stock: stock,
                        search_term: search_term,
                        sort_by: sort_by
                    },
                    beforeSend: function(){
                        hideLoadingItem();
                    },
                    success:function(data){
                        const tempContainer = document.createElement('div');
                        tempContainer.innerHTML = data;
                        $('#searchContainer').html('');
                        $('#searchContainer').html(tempContainer);
                    },
                    complete: function(){
                        showLoadingItem();
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                })
            }

            $('body').on('change', '[name="category_checkbox"]', function(){
                var isChecked = $(this).prop('checked');
                if ($(this).val() === 'default') {
                    // If categoryAll is checked, check all other category checkboxes
                    $('[name="category_checkbox"]').not(this).prop('checked', isChecked);
                } else {
                    // If any other category checkbox is unchecked, uncheck categoryAll checkbox
                    $('#filter\\.categoryAll').prop('checked', false);
                }

                var page = $('#hidden_page').val();
                var selectedCategories = [];
                $('[name="category_checkbox"]:checked').each(function () {
                    selectedCategories.push($(this).val());
                });

                console.log(selectedCategories);

                var selectedRatings = [];
                $('.rating_checkbox:checked').each(function () {
                    selectedRatings.push($(this).val());
                });

                var stock = $('#filter_stock').val();
                var search_term = "{{ request('search') }}";
                var sort_by = $('#sort_by').val();

                fetch_data(page, selectedCategories, selectedRatings, stock, search_term, sort_by);
            });

            $('body').on('change', '.rating_checkbox', function(){
                var page = $('#hidden_page').val();
                var selectedCategories = [];
                $('[name="category_checkbox"]:checked').each(function () {
                    selectedCategories.push($(this).val());
                });

                var selectedRatings = [];
                $('.rating_checkbox:checked').each(function () {
                    selectedRatings.push($(this).val());
                });

                var stock = $('#filter_stock').val();
                var search_term = "{{ request('search') }}";
                var sort_by = $('#sort_by').val();
                
                fetch_data(page, selectedCategories, selectedRatings, stock, search_term, sort_by);
            });

            $('body').on('click', '.pager a', function(event){
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                $('#hidden_page').val(page);
                var selectedCategories = [];
                $('[name="category_checkbox"]:checked').each(function () {
                    selectedCategories.push($(this).val());
                });

                console.log(selectedCategories);

                var selectedRatings = [];
                $('.rating_checkbox:checked').each(function () {
                    selectedRatings.push($(this).val());
                });

                var stock = $('#instock').val();
                var search_term = "{{ request('search') }}";
                var sort_by = $('#sort_by').val();
                
                fetch_data(page, selectedCategories, selectedRatings, stock, search_term, sort_by);

            });

            // $('body').on('keyup', '#searchInput', function(){
            //     var page = $('#hidden_page').val();
            //     var selectedCategories = [];
            //     $('.category_checkbox:checked').each(function () {
            //         selectedCategories.push($(this).val().replace('category.', ''));
            //     });

            //     var selectedRatings = [];
            //     $('.rating_checkbox:checked').each(function () {
            //         selectedRatings.push($(this).val());
            //     });

            //     var stock = $('#instock').val();
            //     var search_term = $('#searchInput').val();
            //     var sort_by = $('#sort_by').val();
                
            //     fetch_data(page, selectedCategories, selectedRatings, stock, search_term, sort_by);
            // });
            
        });

    </script>
</body>
</html>