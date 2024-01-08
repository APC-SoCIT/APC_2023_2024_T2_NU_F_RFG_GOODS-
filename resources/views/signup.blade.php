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
    <div class="bg-cover"
    style="background-image: url('./Img/bg1.jpg'); height: 100vh;">
        <div class="flex justify-center items-center h-screen">
            <div class="w-9/12 bg-gray-300 rounded-xl overflow-hidden grid grid-cols-2">
                <div class="w-full">
                    <div class="py-3">
                        <img class="w-36 h-36 mx-auto" src="./Img/logo1.png" alt="">
                    </div>
                    <div class="py-3">
                        <form class="max-w-96 mx-auto">
                            <div class="mb-5">
                                <input type="text" id="text" class="bg-white border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Username" required>
                            </div>
                            <div class="mb-5">
                                <input type="password" id="password" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Password" required>
                            </div>
                            <p class="mt-3 text-sm text-gray-600 text-center">Already have an account? <a href="/login" class="text-black font-bold">Sign up</a></p>
                            <div class="flex justify-center items-center w-full pt-3">
                                <button type="submit" class="text-black bg-orange-400 hover:bg-orange-400 focus:ring-4 focus:outline-none focus:ring-orange-400 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">LOGIN</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div id="default-carousel" class="relative w-full" data-carousel="slide">
                    <!-- Carousel wrapper -->
                    <div class="relative h-60 overflow-hidden rounded-r-lg md:h-full">
                        <!-- Item 1 -->
                        <div class="duration-700 ease-in-out" data-carousel-item>
                            <img src="./Img/chi.jpg" class="absolute bottom-0 top-0 block w-full h-full" alt="...">
                        </div>
                        <!-- Item 2 -->
                        <div class="duration-700 ease-in-out" data-carousel-item>
                            <img src="./Img/chili.jpg" class="absolute block w-full h-full" alt="...">
                        </div>
                        <!-- Item 3 -->
                        <div class="duration-700 ease-in-out" data-carousel-item>
                            <img src="./Img/butter.jpg" class="absolute block w-full h-full" alt="...">
                        </div>
                        <!-- Item 4 -->
                        <div class="duration-700 ease-in-out" data-carousel-item>
                            <img src="./Img/garlic.jpg" class="absolute block w-full h-full" alt="...">
                        </div>
                        <!-- Item 5 -->
                        <div class="duration-700 ease-in-out" data-carousel-item>
                            <img src="./Img/honey.jpg" class="absolute block w-full h-full" alt="...">
                        </div>
                    </div>
                    <!-- Slider indicators -->
                    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                        <button type="button" class="w-3 h-3 rounded-full bg-orange-500" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                        <button type="button" class="w-3 h-3 rounded-full bg-orange-500" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                        <button type="button" class="w-3 h-3 rounded-full bg-orange-500" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                        <button type="button" class="w-3 h-3 rounded-full bg-orange-500" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
                        <button type="button" class="w-3 h-3 rounded-full bg-orange-500" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</body>
</html>