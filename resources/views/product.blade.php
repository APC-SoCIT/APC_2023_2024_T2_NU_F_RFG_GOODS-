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
    <div class="grid grid-cols-2">
        <div class="mx-auto">
            <div class="grid gap-4 mx-auto px-6 py-8">
                <div>
                    <img class="h-80 w-96 rounded-lg mx-auto" src="./Img/chi.jpg" alt="">
                </div>
                <div class="grid grid-cols-4 gap-2.5 flex justify-center items-center px-6">
                    <div>
                        <img class="h-1/4 w-80" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg" alt="">
                    </div>
                    <div>
                        <img class="h-1/4 w-80" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-2.jpg" alt="">
                    </div>
                    <div>
                        <img class="h-1/4 w-80" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-3.jpg" alt="">
                    </div>
                    <div>
                        <img class="h-1/4 w-60" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-4.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @include('footer.footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</body>
</html>