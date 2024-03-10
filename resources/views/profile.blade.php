<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="/Img/logo1.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RFG - Profile</title>
    <link rel="stylesheet" href="/dist/output.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css"  rel="stylesheet" />
</head>
<body>
    @include('navbar.navbar')
    <div class="bg-white h-full">
        <div class="container mx-auto p-5">
            <div class="flex ">
                <!-- Left Side -->
                <div class="w-full h-full md:w-3/12 md:mx-2">
                    <!-- Profile Card -->
                    <div class="bg-zinc-300 p-3 border-t-4 border-green-400 h-svh">
                        <div class="image overflow-hidden">
                            <img class="h-40 w-40 mx-auto rounded-full"
                                src="./Img/fortnitekid.jpg"
                                alt="">
                        </div>
                        <h1 class="text-gray-900 font-bold text-xl leading-8 my-1 text-center pt-4">Sincereko</h1>
                        <hr class="h-px my-4 bg-gray-200 border-0 dark:bg-gray-700">
                        <div>
                            <div class="">
                                <h1 class="font-bold pb-1.5">My Account</h1>
                                <ul class="pl-6 pb-2">
                                    <li class="flex items-center">
                                        <a href="" class="font-semibold hover:text-orange-400"><span>Profile</span></a>
                                    </li>
                                    <li class="flex items-center">
                                        <a href="" class="font-semibold hover:text-orange-400"><span>Addresses</span></a>
                                    </li>
                                    <li class="flex items-center">
                                        <a href="" class="font-semibold hover:text-orange-400"><span>Change Password</span></a>
                                    </li>
                                </ul>
                                <div class="flex flex-col space-y-2 my-2">
                                    <div class="pb-2">
                                        <a href="" class="font-bold hover:text-orange-400"><span>My Purchase</span></a>
                                    </div>
                                    <div class="pb-2">
                                        <a href="" class="font-bold hover:text-orange-400"><span>Notifications</span></a>
                                    </div>
                                    <div class="pb-2">
                                        <a href="" class="font-bold hover:text-orange-400"><span>My Vouchers</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of profile card -->
                    <div class="my-2"></div>
                </div>
                <!-- Right Side -->
                <div class="w-full md:w-9/12 mx-2 h-64">
                    <!-- Profile tab -->
                    <!-- About Section -->
                    <div class="bg-zinc-300 p-3 shadow-sm rounded-sm h-svh">
                        <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                            <span clas="text-green-500">
                                <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </span>
                            <span class="tracking-wide">About</span>
                        </div>
                        <hr class="h-px my-4 bg-gray-200 border-0 dark:bg-gray-700">
                        <div class="text-gray-700">
                            <div class="grid md:grid-cols-2 text-sm">
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold pt-3">First Name</div>
                                    <div class="px-4 py-2 pt-3">Marlon</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Last Name</div>
                                    <div class="px-4 py-2">Berto</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold pt-3">Gender</div>
                                    <div class="px-4 py-2 pt-3">Male</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold pt-3">Contact No.</div>
                                    <div class="px-4 py-2 pt-3">+63 956468182</div>
                                </div>
                                
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold pt-3">Current Address</div>
                                    <div class="px-4 py-2 pt-3">Capulong Street, Tondo, Manila</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold pt-3">Permanant Address</div>
                                    <div class="px-4 py-2 pt-3">Balut, Tondo, Manila</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold pt-3">Email.</div>
                                    <div class="px-4 py-2 pt-3">
                                        <a class="text-black" href="mailto:jane@example.com">supermarlon13@gmail.com</a>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold pt-3">Birthday</div>
                                    <div class="px-4 py-2 pt-3">Feb 06, 1998</div>
                                </div>
                            </div>
                        </div>
                        <button
                            class="block w-full text-black text-sm font-semibold rounded-lg hover:bg-gray-100 focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">Edit Information</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</body>
</html>