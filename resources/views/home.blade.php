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
    <div id="default-carousel" class="relative w-full" data-carousel="slide">
        <!-- Carousel wrapper -->
        <div class="relative h-2/6 overflow-hidden md:h-96">
            <!-- Item 1 -->
            <div class="duration-700 ease-in-out" data-carousel-item>
                <img src="./Img/jam.jpg" class="absolute bottom-0 top-0 block w-full h-full" alt="...">
            </div>
            <!-- Item 2 -->
            <div class="duration-700 ease-in-out" data-carousel-item>
                <img src="/docs/images/carousel/carousel-2.svg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <!-- Item 3 -->
            <div class="duration-700 ease-in-out" data-carousel-item>
                <img src="/docs/images/carousel/carousel-3.svg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <!-- Item 4 -->
            <div class="duration-700 ease-in-out" data-carousel-item>
                <img src="/docs/images/carousel/carousel-4.svg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <!-- Item 5 -->
            <div class="duration-700 ease-in-out" data-carousel-item>
                <img src="/docs/images/carousel/carousel-5.svg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
        </div>
        <!-- Slider indicators -->
        <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
            <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
        </div>
        <!-- Slider controls -->
        <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>
    <p class="text-3xl font-bold flex justify-center py-6">Best Sellers</p> 
    <div class="mx-auto grid grid-cols-3 gap-3 flex items-center justify-center py-6 mb-8 max-w-6xl">
        <div class="mx-auto w-80 h-96 bg-slate-300 rounded-3xl drop-shadow-2xl">
            <img class="w-full h-64 rounded-t-3xl" src="./Img/chi.jpg" alt="">
            <div class="h-16 my-2 px-6">
                <p class="text-center">Ready to fry RG’S Special Pork Chicharon 250g</p>
            </div>
            <div class="flex">
            <button class="mx-auto bg-orange-400 rounded-3xl px-6 py-2 font-bold">Buy Now</button>
            </div>
        </div>
        <div class="mx-auto w-80 h-96 bg-slate-300 rounded-3xl drop-shadow-2xl">
            <img class="w-full h-64 rounded-t-3xl" src="./Img/garlic.jpg" alt="">
            <div class="h-16 my-2 px-6">
                <p class="text-center">JAMIE’S CHILI GARLIC (220ML)</p>
            </div>
            <div class="flex">
            <button class="mx-auto bg-orange-400 rounded-3xl px-6 py-2 font-bold">Buy Now</button>
            </div>
        </div>
        <div class="mx-auto w-80 h-96 bg-slate-300 rounded-3xl drop-shadow-2xl">
            <img class="w-full h-64 rounded-t-3xl" src="./Img/vini.jpg" alt="">
            <div class="h-16 my-2 px-6">
                <p class="text-center">JAMIE’S CHILLI VINEGAR - PREMIUM BLEND (375ML)</p>
            </div>
            <div class="flex">
            <button class="mx-auto bg-orange-400 rounded-3xl px-6 py-2 font-bold">Buy Now</button>
            </div>
        </div>
    </div>

@include('footer.footer')
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</body>
</html>